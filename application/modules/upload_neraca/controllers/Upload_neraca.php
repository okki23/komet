<?php
date_default_timezone_set("Asia/Jakarta");
defined('BASEPATH') OR exit('No direct script access allowed');

class upload_neraca extends MY_Controller {
    
    var $parsing_form_input = array('id','nama_file','path_upload','date_upload');
    var $tablename = 'm_neraca';
    var $pk = 'id';
    
    public function __construct(){
		parent ::__construct();
		$this->load->model('m_upload_neraca','ma');
	}
	public function index()
	{
        $data['content'] = 'upload_neraca/view_upload_neraca'; 
		$data['title'] = $this->data['meta_title'];
        //session
        $data['upload_neraca'] = $this->ma->get($this->tablename,$this->pk)->result();
        //var_dump($data['upload_neraca']);
        $data['username'] = $this->session->userdata('username');
        $data['user_group'] = strtoupper(level_help($this->session->userdata('user_group')));
        $data['user_id'] = $this->session->userdata('user_id');
		$this->load->view('template_admin',$data); 
	}

	public function edit($id = NULL) {
        $data['content'] = 'upload_neraca/edit_upload_neraca'; 
		$data['title'] = $this->data['meta_title'];       
        if($id == '' || empty($id) || $id == NULL){
            $data['upload_neraca'] = $this->ma->get_new($this->parsing_form_input);
        }else{
            $data['upload_neraca'] = $this->ma->get($this->tablename,$this->pk,$id)->row();
        }
        //session
        $data['username'] = $this->session->userdata('username');
        $data['user_group'] = strtoupper(level_help($this->session->userdata('user_group')));
        $data['user_id'] = $this->session->userdata('user_id');
		$this->load->view('template_admin',$data);          
	}
	
	public function delete() {
        $id = $this->uri->segment(3);

        $get = $this->db->query("select * from m_neraca where id = '$idpost'")->row();
        if($get->path_upload != '' || $get->path_upload == NULL){
            unlink("uploads/".str_replace(" ","_",$get->path_upload));
        }

        $sql = $this->ma->delete($this->pk,$this->tablename,$id);
        redirect(base_url('upload_neraca'));
    }

    public function save() {    
        $posfile = $this->input->post('path_upload');   
        $data = $this->ma->array_from_post(array('id','nama_file','path_upload','date_upload'));
        $id = isset($data['id']) ? $data['id'] : NULL;
        $exe = $this->ma->save($data,$this->tablename,$this->pk, $id);
        
        $config['upload_path'] = "uploads/";
        $config['allowed_types'] = 'gif|bmp|jpg|jpeg|png|xls|xlsx|doc|docx|pdf|rtf';
        $config['max_size'] = 5000;
        $config['remove_spaces'] = TRUE;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if ($posfile != '') {
            $this->upload->do_upload('path_uploadx');
        }

        redirect(base_url('upload_neraca'));
    }
}
