<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FrontEnd_Controller extends MY_Controller {

    public function __construct() {
        parent::__construct();

        //load stuff
        $this->load->model('page/page_m');
        //$this->load->model('article/models/article_m');

        //for paging
        $this->data['menu'] = $this->page_m->get_nested();
        //$this->data['pref'] = $this->setting_m->get_pref();
        //$this->data['favicon'] = $this->setting_m->get_favicon();
        //echo $this->db->last_query();
        $this->data['news_archive_link'] = $this->page_m->get_archive_link();
        $this->data['meta_title'] = config_item('site_name');
    }

}
