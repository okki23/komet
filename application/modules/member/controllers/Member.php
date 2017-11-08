<?php
date_default_timezone_set("Asia/Jakarta");
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends MY_Controller {
    
    var $parsing_form_input = array('id','no_anggota','nama_asli','nama_panggilan','no_ktp','tempat_lahir','tanggal_lahir','jen_kel','alamat','agama','status_kawin','pekerjaan','kewarganegaraan','no_telp','email','daerah_asal','nama_istri_suami','anak_a','anak_b','anak_c','anak_d','anak_e','anak_f');
    var $tablename = 'm_anggota';
    var $pk = 'id';
    
    public function __construct(){
		parent ::__construct();
		$this->load->model('m_member','ma');
	}
	public function index()
	{
        $data['content'] = 'member/view_member'; 
		$data['title'] = $this->data['meta_title'];
        //session
        $data['member'] = $this->ma->get($this->tablename,$this->pk)->result();
        //var_dump($data['member']);
        $data['username'] = $this->session->userdata('username');
        $data['user_group'] = strtoupper(level_help($this->session->userdata('user_group')));
        $data['user_id'] = $this->session->userdata('user_id');
		$this->load->view('template_admin',$data); 
	}

	public function edit($id = NULL) {
        $data['content'] = 'member/edit_member'; 
		$data['title'] = $this->data['meta_title'];       
        if($id == '' || empty($id) || $id == NULL){
            $data['member'] = $this->ma->get_new($this->parsing_form_input);
        }else{
            $data['member'] = $this->ma->get($this->tablename,$this->pk,$id)->row();
        }
        //session
        $data['username'] = $this->session->userdata('username');
        $data['user_group'] = strtoupper(level_help($this->session->userdata('user_group')));
        $data['user_id'] = $this->session->userdata('user_id');
		$this->load->view('template_admin',$data);          
	}
	
	public function delete() {
        $id = $this->uri->segment(3);
        $sql = $this->ma->delete($this->pk,$this->tablename,$id);
        redirect(base_url('member'));
    }

    public function save() {       
        $data = $this->ma->array_from_post(array('id','no_anggota','nama_asli','nama_panggilan','no_ktp','tempat_lahir','tanggal_lahir','jen_kel','alamat','agama','status_kawin','pekerjaan','kewarganegaraan','no_telp','email','daerah_asal','nama_istri_suami','anak_a','anak_b','anak_c','anak_d','anak_e','anak_f'));
        $id = isset($data['id']) ? $data['id'] : NULL;
        $exe = $this->ma->save($data,$this->tablename,$this->pk, $id);
        redirect(base_url('member'));
    }
}
