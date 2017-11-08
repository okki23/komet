<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_article_internal extends MY_Model {

    function __construct() {
        parent::__construct();
    }
 
    public function get_by_id($id){
        $this->db->where('id',$id);
        return $this->db->get('article_internals');
    }

}
