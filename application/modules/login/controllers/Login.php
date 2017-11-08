<?php
date_default_timezone_set("Asia/Jakarta");
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct(){
      parent::__construct();
      $this->load->model('m_login');
      /*
      session list - role access
      1.superadmin = all menu, all master
      2.ppic = request goods and view status
      3.adminproduksi = using goods and result goods
      4.purchasing = request goods for payment status
      5.supervisor = report using and result goods
      */
    }

    public function index() {
    
        $data['judul'] = $this->data['meta_title'];
        $this->load->view('login/login_view', $data);
    }

    public function auth(){
      //echo 1;
      $datapos = array('username'=>$this->input->post('username'),
                      'password'=>md5($this->input->post('password')));
      var_dump($datapos);
      $avail = $this->m_login->auth($datapos)->num_rows();
      $usersess = $this->m_login->auth($datapos)->row();

      if($avail > 0){
  			$list = array('username'=>$usersess->username,'user_group'=>$usersess->level,'user_id'=>$usersess->id_pegawai);
  			$this->session->set_userdata($list);
        
        if($list['user_group'] == '1'){
          redirect(base_url('dashboard'));
        }else{
          redirect(base_url('dashboard_member'));
        }

  		 
  		}else{

  			redirect(base_url('login'));
  		}
    }

    public function logout(){
		//mematikan seluruh session yang sudah terdaftar dan kembali ke halaman login
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}


}
