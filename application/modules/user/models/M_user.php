<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends MY_Model {

	public function get_new($arrdata){
		$setting = new StdClass();

				foreach ($arrdata as $key => $column_order) {
						$setting->$column_order = '';
				}

				return $setting;
	}

  public function opt_pegawai(){
	 return	$this->db->get('m_anggota')->result();
	}

	public function list_user(){
		return $this->db->query('select a.*,b.nama_asli from m_user a
														left join m_anggota b on b.id = a.id_pegawai')->result();
	}
	
	
public function save_account($data,$id=NULL,$tablename){
	if($id == '' || empty($id) || $id==NULL){
		$this->db->set($data);
		$this->db->set('password',md5($data['password']));

		$res = $this->db->insert($tablename);
		//echo 'simpen';
	}else{
		if($data['password'] == NULL || empty($data['password']) || $data['password'] == ''){
				$this->db->set('username',$data['username']);
			 
				$this->db->set('id_pegawai',$data['id_pegawai']);
				$this->db->set('level',$data['level']);  
				 
				$this->db->where('id',$data['id']);
				$res = $this->db->update($tablename);
				//echo 'password ga diubah';
		}else{
			$this->db->set($data);
			$this->db->set('password',md5($data['password']));
			$this->db->where('id',$data['id']);
			$res = $this->db->update($tablename);
			//echo 'password_diubah';
		}

	}

	return $res;
}

public function get_all($id=NULL,$tablename){
	if($id == '' || empty($id) || $id==NULL){
		$res = $this->db->get($tablename);
	}else{
		$this->db->where('id',$id);
		$res = $this->db->get($tablename);
	}
	return $res;
}

}
