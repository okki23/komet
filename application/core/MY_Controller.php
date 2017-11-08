<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	
	public $data = array();
	 
	function __construct(){
		parent::__construct();
		 
		$this->data['meta_title'] = 'PCJ BAKABA';
		
        //$this->data['pref'] = $this->setting_m->get_pref();
		 
	}

	function get_data(){
		$data = $this->db->query("select * from articles")->result();
		return $data;
	}
}
