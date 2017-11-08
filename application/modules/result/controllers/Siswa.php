<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends MY_Controller {
	public function __construct(){
		parent ::__construct();
	}
	public function index()
	{
		$data['content'] = 'siswa/view_siswa'; 
		$data['title'] = $this->data['meta_title'];
		$this->load->view('template_admin',$data);
	}
}
