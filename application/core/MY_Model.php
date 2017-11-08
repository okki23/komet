<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

    protected $_table_name = '';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = '';
    public $_rules = array();
    protected $_timestamps = FALSE;

    function __construct() {
        parent::__construct();
    }

    
    public function get_new($list) {
        $setting = new StdClass();
            foreach ($list as $key => $column_order) {
            $setting->$column_order = '';
            }
        return $setting;
    }
         
  

    public function array_from_post($fields) {
        $data = array();
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        return $data;
    }

    public function get_by($where) {
        $this->db->where($where);
        return $this->db->get($this->_table_name)->row();
    }

    public function get($tablename,$pk,$id = NULL){
        
         if($id == NULL || $id == '') {
           return $this->db->get($tablename);
         }else{
           $this->db->where($pk,$id);
           return $this->db->get($tablename);
         }
       }

    public function save($data,$tablename,$pk, $id = NULL) {
        if ($this->_timestamps == TRUE) {
            $now = date('Y-m-d H:i:s');
            // $id || $data['created'] = $now;
            // $data['modified'] = $now;
        }

        if ($id === NULL || $id == '') {
            !isset($pk) || $pk = NULL;
            $this->db->set($data);
            $this->db->insert($tablename);
            $id = $this->db->insert_id();
            //echo 'simpan';
        } else {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->set($data);
            $this->db->where($pk, $id);
            $this->db->update($tablename);
            //echo 'update';
        }
        //return $id;
    }

    public function delete($pk,$tablename,$id) {
      
        $this->db->where($pk, $id);
        return $this->db->delete($tablename);
    }

}

?>