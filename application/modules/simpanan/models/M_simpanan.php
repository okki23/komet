<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_simpanan extends MY_Model {

	public function get_new($arrdata){
		$setting = new StdClass();

				foreach ($arrdata as $key => $column_order) {
						$setting->$column_order = '';
				}

				return $setting;
	}

	/*
	select a.id,a.id_anggota,a.nama_asli,b.tanggal_bayar,b.status,b.jumlah_bayar,sum(b.jumlah_bayar) as summary from m_anggota a
left join t_simpanan b on b.id_anggota = a.id
GROUP BY a.id
 */
	public function get_all_sum_trans(){
		return $this->db->query("select a.id,b.id_anggota,a.nama_asli,b.tanggal_bayar,b.status,b.jumlah_bayar,sum(b.jumlah_bayar) as summary from m_anggota a
		left join t_simpanan b on b.id_anggota = a.id
		GROUP BY a.id");
	}

	public function save_data($data,$tablename){
	 
		return  $this->db->query("insert into t_simpanan (id,id_anggota,tanggal_bayar,jumlah_bayar,status) values (null,'".$data['id_anggota']."','".$data['tanggal_bayar']."','".$data['jumlah_bayar']."','".$data['status']."') ");
	}

	public function save_data_update($data,$tablename){
		return  $this->db->query("update t_simpanan set tanggal_bayar = '".$data['tanggal_bayar']."',jumlah_bayar = '".$data['jumlah_bayar']."',status = '".$data['status']."'  where id = '".$data['id']."' and id_anggota = '".$data['id_anggota']."' ");
		 
	}

}
