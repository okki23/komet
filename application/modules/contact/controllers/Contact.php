<?php
date_default_timezone_set("Asia/Jakarta");
defined('BASEPATH') OR exit('No direct script access allowed');

class contact extends MY_Controller {
	public function __construct(){
		parent ::__construct();
		$this->load->model("home/m_home","mh");
	}
	public function index()
	{
		$data['content'] = 'contact/view_contact'; 
		$data['title'] = $this->data['meta_title'];
		$jumlah_data = $this->mh->jumlah_data();
		$this->load->library('pagination');	
		
				$config['base_url'] = base_url().'contact/index/';
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


		$this->load->view('template_frontend',$data);
	}
	public function sendmail(){
	 
		$this->load->library('email');
		
				$this->email->set_newline("\r\n");
		
				$config['protocol'] = 'smtp';
				$config['smtp_host'] = 'mail.pcj-bakaba.com';
				$config['smtp_port'] = '465';
				$config['smtp_user'] = 'info@pcj-bakaba.com';
				$config['smtp_from_name'] = 'INFO PCJ';
				$config['smtp_pass'] = 'pcjbkb2017';
				$config['wordwrap'] = TRUE;
				$config['newline'] = "\r\n";
				$config['mailtype'] = 'html';                       
		
				$this->email->initialize($config);
		
				$this->email->from($config['smtp_user'], $config['smtp_from_name']);
				$this->email->to($this->input->post('email'));
				// $this->email->cc($attributes['cc']);
				// $this->email->bcc($attributes['cc']);
				$this->email->subject('TES');
		
				$this->email->message('UYE');
		
				if($this->email->send()) {
					return true;        
				} else {
					return false;
				}       

	}
}
