<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard_member extends MY_Model {

	public function get_new($arrdata){
		$setting = new StdClass();

				foreach ($arrdata as $key => $column_order) {
						$setting->$column_order = '';
				}

				return $setting;
	}

 
}
