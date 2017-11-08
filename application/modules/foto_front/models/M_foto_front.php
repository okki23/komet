<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_foto_front extends CI_Model {
    function data($number,$offset){
			$this->db->order_by("pubdate", "desc"); 
		return $query = $this->db->get('articles',$number,$offset)->result();		
	}
    function jumlah_data(){
		return $this->db->get('articles')->num_rows();
	}
}
