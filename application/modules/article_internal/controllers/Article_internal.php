<?php
date_default_timezone_set("Asia/Jakarta");
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_internal extends MY_Controller {
    
    var $parsing_form_input = array('id','title','slug','pubdate','body','category','tags','created','modified');
    var $tablename = 'articles_internal';
    var $pk = 'id';
    
    public function __construct(){
		parent ::__construct();
        $this->load->model('m_article_internal','ma');
        $this->load->model('home/m_home','mh');
	}
	public function index()
	{
         
	    $data['content'] = 'article_internal/view_article_internal'; 
		$data['title'] = $this->data['meta_title'];
        
        //session
        $data['article_internal'] = $this->ma->get($this->tablename,$this->pk)->result();
        //var_dump($data['article_internal']);
        $data['username'] = $this->session->userdata('username');
        $data['user_group'] = strtoupper(level_help($this->session->userdata('user_group')));
        $data['user_id'] = $this->session->userdata('user_id');
		$this->load->view('template_admin',$data); 
	}

	public function edit($id = NULL) {
        $data['content'] = 'article_internal/edit_article_internal'; 
		$data['title'] = $this->data['meta_title'];
        
        if($id == '' || empty($id) || $id == NULL){
            $data['article_internal'] = $this->ma->get_new($this->parsing_form_input);
              
          }else{
          
            $data['article_internal'] = $this->ma->get($this->tablename,$this->pk,$id)->row();
  
          }
         
        //session
        $data['username'] = $this->session->userdata('username');
        $data['user_group'] = strtoupper(level_help($this->session->userdata('user_group')));
        $data['user_id'] = $this->session->userdata('user_id');
		$this->load->view('template_admin',$data); 
        // if ($id) {
        //     $this->data['article_internal'] = $this->m_article_internal->get($id);
        //     count($this->data['article_internal']) || $this->data['errors'][] = "article_internal could not be found";
        // } else {
        //     $this->data['article_internal'] = $this->m_article_internal->get_new();
        // }
        
        // $data = $this->m_article_internal->array_from_post(array('title', 'slug', 'body', 'pubdate'));
        // $id == NULL || $this->data['article_internal'] = $this->m_article_internal->get($id);
        // $data['content'] = 'article_internal/form_article_internal'; 
        // $this->data['title'] = $this->data['title'];
		// $data['username'] = $this->session->userdata('username');
        // $data['user_group'] = strtoupper(level_help($this->session->userdata('user_group')));
        // $data['user_id'] = $this->session->userdata('user_id');
        // $this->load->view('template_admin', $this->data);
	}
	public function article_internal_detail(){

        $jumlah_data = $this->mh->jumlah_data();
       
        $id = $this->uri->segment(3);
        $data['berita'] = $this->ma->get_by_id($id)->row();
      
 
                $this->load->library('pagination');
        
                $config['base_url'] = base_url().'article_internal/article_internal_detail/'.$id.'/';
                $config['total_rows'] = $jumlah_data;
                $config['per_page'] = 3;
                
                $config['full_tag_open'] = '<div align="center"><ul class = "pagination" style="font-size: 70%; text-decoration:none;">';
                $config['full_tag_close'] = '</div></ul>';
                $config['first_link'] = 'First';
                $config['first_tag_open'] = '<li>';
                $config['first_tag_close'] = '</li>';
                $config['last_link'] = 'Last';
                $config['last_tag_open'] = '<li>';
                $config['last_tag_close'] = '</li>';
                $config['next_link'] = 'Next';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                $config['prev_link'] = 'Previous';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class="active"><a href="">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
            //isset($_REQUEST['action']) ? $_REQUEST['action'] : 'login'
                //$from = isset($this->uri->segment(4)) ? $this->uri->segment(4) : '';
              
                if($this->uri->segment(4) == '' || empty($this->uri->segment(4)) || $this->uri->segment(4) == NULL){
                    $from = 0;
                }else{
                    $from = $this->uri->segment(4);
                }
                $this->pagination->initialize($config);		
                $data['list'] = $this->mh->data($config['per_page'],$from);
                $data['content'] = 'article_internal/article_internal_detail'; 
                $data['title'] = $this->data['meta_title'];
                $this->load->view('template_frontend',$data);

      
    }
	public function delete() {
        $id = $this->uri->segment(3);
        
        $sql = $this->ma->delete($this->pk,$this->tablename,$id);

        redirect(base_url('article_internal'));
    }

    public function save() {
        
        $data = $this->ma->array_from_post(array('id', 'title', 'slug', 'pubdate', 'body'));
        $id = isset($data['id']) ? $data['id'] : NULL;
        // echo $id;
        // echo '<hr>';
        // var_dump($data);
        // exit();
       
        $exe = $this->ma->save($data,$this->tablename,$this->pk, $id);
        // exit();
        redirect(base_url('article_internal'));
    }
}
