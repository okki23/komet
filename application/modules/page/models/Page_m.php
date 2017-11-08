<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Page_m extends MY_Model {

    protected $_table_name = 'pages';
    protected $_theme_table = 'options';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'name';
   
    protected $_timestamps = FALSE;

    function __construct() {
        parent::__construct();
    }
    
    public function get_current_theme(){
        return $this->db->get($this->_theme_table)->row();
    }
    public function array_from_post($fields) {
        $data = array();
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        return $data;
    }
    
    public function get_sliderstat(){
        return $this->db->get($this->_theme_table)->row();
       
    }
    
    public function get_slidercont(){
       return $this->db->get('slider')->result();
       
    }
    public function get_sidebar($get_template){
       return $this->db->where('template',$get_template)->get($this->_table_name)->row();
    }

    public function save_order($pages) {
        if (count($pages)) {
            foreach ($pages as $order => $page) {
                if ($page['item_id'] != '') {
                    $data = array('parent_id' => (int) $page['parent_id'], 'order' => $order);
                    $this->db->set($data)->where($this->_primary_key, $page['item_id'])->update($this->_table_name);
                }
            }
        }
    }

    // public function save($data, $id = NULL) {
    //     if ($this->_timestamps == TRUE) {
    //         $now = date('Y-m-d H:i:s');
    //         $id || $data['created'] = $now;
    //         $data['modified'] = $now;
    //     }
    //     $result = false;
    //     if ($id === NULL || $id === 0 || $id === "") {
    //         !isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;

    //         $this->db->set($data);
    //         $this->db->insert($this->_table_name);
    //         $id = $this->db->insert_id();
    //     } else {
    //         $filter = $this->_primary_filter;
    //         $id = $filter($id);
    //         //$data['password'] = $this->hash($data['password']);
    //         $list = array('title' => $data['title'], 'slug' => $data['slug'], 'body' => $data['body'], 'parent_id' => $data['parent_id'],'p_status'=>$data['p_status'],'sidebar'=>$data['sidebar']);
    //         $this->db->set($data);
    //         $this->db->where($this->_primary_key, $id);
    //         $this->db->update($this->_table_name);
    //     }

    //     return $result;
    // }

    //ambil anak
    public function sort_nested(array $pages, $parent_id = 0) {
        $arrData = array();

        foreach ($pages as $page) {

            $pages = $this->db->order_by('id', 'asc')->where('parent_id', $page['id'])->where('p_status','Y')->get('pages')->result_array();
            $children = $this->sort_nested($pages, $page['id']);

            if ($children) {
                $page['children'] = $children;
            }
            $arrData[$page['id']] = $page;
        }

        return $arrData;
    }

    //ambil bapak

    public function get_nested() {
        $pages = $this->db->order_by('parent_id', 'asc')
                ->where('parent_id', 0)
                ->where('p_status','Y')
                ->order_by('order', 'asc')
                ->get('pages')->result_array();
       
        $arrData = $this->sort_nested($pages, 0);

        return $arrData;
    }

    public function get_with_parent($limit) {
        $offset = $this->uri->segment(4);
        $this->db->select('pages.*,p.slug as parent_slug, p.title as parent_title');
        $this->db->join('pages as p', 'pages.parent_id=p.id', 'left');
        $this->db->limit($limit,$offset);
        return $this->db->get($this->_table_name);
    }
    
    public function get_with_parent_with_search($limit,$search) {

        $offset = $this->uri->segment(4);
        $this->db->select('pages.*,p.slug as parent_slug, p.title as parent_title');
        $this->db->join('pages as p', 'pages.parent_id=p.id', 'left');
        $this->db->like('pages.title',$search['search']);
        $this->db->limit($limit,$offset);

        return $this->db->get($this->_table_name);
    }
    
     
    public function count_thread($search,$list_cari=NULL){
       
        if($search == ''){
             $sql = $this->db->count_all_results($this->_table_name);
        
        }else{
             $this->db->where($list_cari['search_param'],$list_cari['search']);
             $sql = $this->db->count_all_results($this->_table_name);
        }
        return $sql;
       
    }

    // public function get($id = NULL) {
    //     if ($id != NULL) {
    //         $this->db->where('id', $id);
    //         return $this->db->get($this->_table_name)->row();
    //     } else {
    //         return $this->db->get($this->_table_name)->result();
    //     }
    // }

    // public function delete($id) {
    //     parent::delete($id);

    //     $this->db->set(array('parent_id' => 0))->where('parent_id', $id)->update($this->_table_name);
    // }

    public function login() {
        $page = $this->get_by(array(
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password'))
                ), TRUE);

        if (count($page)) {
            $data = array('name' => $page->name,
                'email' => $page->email,
                'id' => $page->id,
                'loggedin' => TRUE,
            );
            $this->session->set_pagedata($data);
            redirect(base_url('admin/dashboard'));
        }
    }

    public function logged_in() {
        return(bool) $this->session->pagedata('loggedin');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('admin/page/login');
    }

    public function hash($string) {
        //return hash('sha512',$string.config_item('encryption_key'));

        return md5($string);
    }

    // public function get_new() {
    //     $page = new StdClass();
    //     $page->id = '';
    //     $page->title = '';
    //     $page->slug = '';
    //     $page->body = '';
    //     $page->parent_id = 0;
    //     $page->template = '';   
    //     $page->p_status='';
    //     $page->sidebar='';
    //     return $page;
    // }

    public function get_archive_link() {
        $page = parent::get_by(array('template' => 'news_archive'), TRUE);
        return isset($page->slug) ? $page->slug : '';
    }

    public function get_no_parents() {
        $this->db->select('id,title');
        $this->db->where('parent_id', 0);
        $pages = parent::get();
        $array = array(0 => 'No_Parent');
        if (count($pages)) {
            foreach ($pages as $page) {
                $array[$page->id] = $page->title;
            }
        }
        return $array;
    }

}

?>