<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class neraca extends MY_Controller {

  var $parsing_form_input = array('id','kode_neraca','nama_neraca','foto_neraca');
  var $tablename = 'm_product';

    public function __construct() {
        parent::__construct();
        $this->load->model('m_neraca');

        if ($this->session->userdata('username') == '') {
            redirect(base_url('login'));
        }
    }

    public function index() {
        $data['judul'] = $this->data['judul'];

        $data['parse_view'] = 'neraca/neraca_view';
        $data['listing'] = $this->m_neraca->get_all($id=NULL,$this->tablename);

        //session
        $data['username'] = $this->session->userdata('username');
        $data['user_group'] = strtoupper(level_help($this->session->userdata('user_group')));
        $data['neraca_id'] = $this->session->userdata('neraca_id');

        $this->load->view('template', $data);
    }



    public function store(){
        $id = $this->uri->segment(3);
        $data['judul'] = $this->data['judul'];
          if($id == '' || empty($id) || $id == NULL){
            $data['parseform'] = $this->m_neraca->get_new($this->parsing_form_input);
          }else{
            $data['parseform'] = $this->m_neraca->get_all($id,$this->tablename)->row();
          }

          $data['parse_view'] = 'neraca/neraca_store';
          //session
          $data['username'] = $this->session->userdata('username');
          $data['user_group'] = strtoupper(level_help($this->session->userdata('user_group')));
          $data['neraca_id'] = $this->session->userdata('neraca_id');
          $this->load->view('template_admin', $data);
    }


    public function save(){
      $posfile = $this->input->post('foto_neraca');
      $datapos = $this->m_neraca->input_array($this->parsing_form_input);
      $id = isset($datapos['id']) ? $datapos['id'] : '';
      $save = $this->m_neraca->save($datapos,$id,$this->tablename);

      $config['upload_path'] = "uploads/";
      $config['allowed_types'] = 'gif|bmp|jpg|jpeg|png';
      $config['max_size'] = 5000;
      $config['remove_spaces'] = TRUE;
      $this->load->library('upload');
      $this->upload->initialize($config);
      if ($posfile != '') {
          $this->upload->do_upload('foto_neracax');
      }

      if($save){
        echo "<script language=javascript>
         alert('Simpan Data Berhasil');
         window.location='" . base_url('neraca') . "';
             </script>";
      }

    }

    public function delete(){
      $idpost = $this->uri->segment(3);
      $get = $this->db->query("select * from m_product where id = '$idpost'")->row();
      if($get->foto_neraca != '' || $get->foto_neraca == NULL){
          unlink("uploads/".str_replace(" ","_",$get->foto_neraca));
      }
      $del = $this->m_neraca->delete($idpost,$this->tablename);





      if($del){
        echo "<script language=javascript>
         alert('Hapus Data Berhasil');
         window.location='" . base_url('neraca') . "';
             </script>";
      }
    }





}
