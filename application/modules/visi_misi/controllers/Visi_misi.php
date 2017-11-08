<?php
date_default_timezone_set("Asia/Jakarta");
defined('BASEPATH') OR exit('No direct script access allowed');

class Visi_misi extends MY_Controller {
	public function __construct(){
		parent ::__construct();
		$this->load->model('m_visi_misi','mvm');
		$this->load->model('home/m_home','mh');
	}
	public function index()
	{
		$data['content'] = 'visi_misi/view_visi_misi'; 
		$data['title'] = $this->data['meta_title'];
		$data['list_data'] = $this->db->query('select * from page_visi_misi')->row();
		// var_dump($data['list_data']);
		$jumlah_data = $this->mh->jumlah_data();
		
				$this->load->library('pagination');
		
				$config['base_url'] = base_url().'visi_misi/index/';
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
		
				$from = $this->uri->segment(3);
				$this->pagination->initialize($config);		
				$data['list'] = $this->mh->data($config['per_page'],$from);

				
		$this->load->view('template_frontend',$data);
	}
}
