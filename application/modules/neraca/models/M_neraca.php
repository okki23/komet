<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_neraca extends MY_Model {

	public function get_new($arrdata){
		$setting = new StdClass();

				foreach ($arrdata as $key => $column_order) {
						$setting->$column_order = '';
				}

				return $setting;
	}

  public function opt_neraca(){
	 return	$this->db->get('m_employee')->result();
	}

	public function list_neraca(){
		return $this->db->query('select a.*,b.nama from m_neraca a
														left join m_employee b on b.id = a.id_neraca')->result();
	}

}
