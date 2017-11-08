<?php
date_default_timezone_set("Asia/Jakarta");
defined('BASEPATH') OR exit('No direct script access allowed');

class agenda extends MY_Controller {
	public function __construct(){
		parent ::__construct();
		$this->load->model("home/m_home","mh");
	}
	public function index()
	{
		$data['content'] = 'agenda/view_agenda'; 
		$jumlah_data = $this->mh->jumlah_data();
		
		$this->load->library('pagination');	
		$config['base_url'] = base_url().'agenda/index/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 3;
		 
		$config['full_tag_open'] = '<div align="center"><ul class = "pagination" style="font-size: 65%; text-decoration:none;">';
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

		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);		
		$data['list'] = $this->mh->data($config['per_page'],$from);

		$data['list_data'] = $this->db->query("select * from page_agenda")->result();
		$data['title'] = $this->data['meta_title'];
		$this->load->view('template_frontend',$data);
	}
}
