<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends MY_Controller {

	 
	  public function __construct(){
		 parent::__construct();
		 $this->load->helper('form');
		 $this->load->library('form_validation');
         
	 }
}
