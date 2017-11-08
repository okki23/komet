<?php
date_default_timezone_set("Asia/Jakarta");
defined('BASEPATH') OR exit('No direct script access allowed');

class Foto_front extends MY_Controller {
	public function __construct(){
		parent ::__construct();

		$this->load->model("m_foto_front","mh");
		$this->load->model("home/m_home","mh");
		
	}
	public function index()
	{
		$data['content'] = 'foto_front/view_foto_front'; 
		$jumlah_data = $this->mh->jumlah_data();
		$data['con_foto_front'] = $this->db->query("select * from page_foto")->result();
		$data['slide'] = $this->db->query("select * from slider ORDER BY order_slide ASC")->result();
		$this->load->library('pagination');	

		$config['base_url'] = base_url().'foto_front/index/';
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

		//$data['isian'] = $this->get_data();
		$data['title'] = $this->data['meta_title'];
		$this->load->view('template_frontend',$data);
	}
}
