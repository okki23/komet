<?php
date_default_timezone_set("Asia/Jakarta");
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

  var $parsing_form_input = array('id','username','password','id_pegawai','level');
  var $tablename = 'm_user';
  var $pk = 'id';

    public function __construct() {
        parent::__construct();
        $this->load->model('m_user','m_umanagement');
       
        if ($this->session->userdata('username') == '') {
            redirect(base_url('login'));
        }
    }

    public function index() {
   

        $data['title'] = $this->data['meta_title'];
        $data['content'] = 'user/user_view';
        $data['listing'] = $this->m_umanagement->list_user();

        //session
        $data['username'] = $this->session->userdata('username');
        $data['user_group'] = strtoupper(level_help($this->session->userdata('user_group')));
        $data['user_id'] = $this->session->userdata('user_id');

        $this->load->view('template_admin', $data);
    }



    public function store(){

     $id = $this->uri->segment(3);

          if($id == '' || empty($id) || $id == NULL){
            $data['parseform'] = $this->m_umanagement->get_new($this->parsing_form_input);
          }else{
            $data['parseform'] = $this->m_umanagement->get_all($id,$this->tablename)->row();

            //var_dump($data['parseform']);

          }
          $data['title'] = $this->data['meta_title'];
          $data['opt_pegawai'] = $this->m_umanagement->opt_pegawai();
          $data['content'] = 'user/user_store';
          
        //session
        $data['username'] = $this->session->userdata('username');
        $data['user_group'] = strtoupper(level_help($this->session->userdata('user_group')));
        $data['user_id'] = $this->session->userdata('user_id');

          $this->load->view('template_admin', $data);
    }


    public function save(){

      $datapos = $this->m_umanagement->array_from_post($this->parsing_form_input);
    //   var_dump($datapos);
	//   exit();
	  $id = isset($datapos['id']) ? $datapos['id'] : '';
      $save = $this->m_umanagement->save_account($datapos,$id,$this->tablename);
	  //echo $save;
      if($save){
        echo "<script language=javascript>
         alert('Simpan Data Berhasil');
         window.location='" . base_url('user') . "';
             </script>";
      }

    }

    public function delete(){
      $idpost = $this->uri->segment(3);
      $del = $this->m_umanagement->delete($this->pk,$this->tablename,$idpost);

      if($del){
        echo "<script language=javascript>
         alert('Hapus Data Berhasil');
         window.location='" . base_url('user') . "';
             </script>";
      }
    }


    public function transaksi_id($param = '') {
        $data = $this->model_user_management->get_no();
        $lastid = $data->row();
        $idnya = $lastid->id;


        if ($idnya == '') { // bila data kosong
            $ID = $param . "0000001";
            //00000001
        } else {
            $MaksID = $idnya;
            $MaksID++;
            if ($MaksID < 10)
                $ID = $param . "000000" . $MaksID;
            else if ($MaksID < 100)
                $ID = $param . "00000" . $MaksID;
            else if ($MaksID < 1000)
                $ID = $param . "0000" . $MaksID;
            else if ($MaksID < 10000)
                $ID = $param . "000" . $MaksID;
            else if ($MaksID < 100000)
                $ID = $param . "00" . $MaksID;
            else if ($MaksID < 1000000)
                $ID = $param . "0" . $MaksID;
            else
                $ID = $MaksID;
        }

        return $ID;
    }



}
