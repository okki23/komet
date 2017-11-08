<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends MY_Model {

    public function auth($datapos){
      $this->db->where('username',$datapos['username']);
      $this->db->where('password',$datapos['password']);
      return $this->db->get('m_user');
    }

}
