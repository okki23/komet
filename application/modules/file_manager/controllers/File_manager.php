<?php
date_default_timezone_set("Asia/Jakarta");
defined('BASEPATH') OR exit('No direct script access allowed');

class File_manager extends FrontEnd_Controller {

    public function __construct() {
        parent::__construct();
    }

    function index() {
        //$this->load->helper('path');
        //echo set_RealPath('uploads'). " - ".base_url('uploads');die();
        $this->load->view('file_manager/filemanager');
    }
    
    function elfinder_init() {
        $this->load->helper('general_helper');
        $opts = initialize_elfinder();
        $this->load->library('elfinder_lib', $opts);
    }
    
    function filetes(){
        $this->load->view('file_manager/filetes');
    }

}
