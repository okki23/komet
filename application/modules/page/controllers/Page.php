<?php
date_default_timezone_set("Asia/Jakarta");
/*
  author : Okki Setyawan &copy; 2016
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends FrontEnd_Controller {

    private $limit = 4;

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $id = $this->uri->segment(1);


        if ($id == '' || $id == NULL || !$id) {
            $cont = 'homepage';
        } else {
            $cont = $id;
        }
        $this->data['page'] = $this->page_m->get_by(array('slug' => (string) $cont), TRUE);
        // $me = $this->data['page'] = $this->page_m->get_by(array('slug' => (string) $cont), TRUE);
        // var_dump($me);
        // exit();
        $get_template = $this->data['page']->template;
        $method = '_' . $this->data['page']->template;

        add_meta_title($this->data['page']->title);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            log_message('error', 'Could not load template' . $method . 'in file' . __FILE__ . 'at line' . __LINE__);
            show_error('could not load template' . $method);
        }


        $this->data['curr_template'] = $this->page_m->get_current_theme();
        $this->data['curr_style'] = $this->page_m->get_current_theme();
        $this->data['list'] = $this->article_m->get();
        $this->data['meta_title'] = $this->data['meta_title'];
        $this->data['sidebar'] = $this->page_m->get_sidebar($get_template);
        $this->data['sliderstat'] = $this->page_m->get_sliderstat();
        $this->data['slidercont'] = $this->page_m->get_slidercont();
        $this->data['favicon'] = '11';
        $this->data['subview'] = $this->data['page']->template;
        $this->load->view('_main_layout', $this->data);
    }

    private function _news_archive() {
        $this->load->library('pagination');
        //var_dump($this->uri->segment(1));
        $this->data['articles'] = $this->article_m->get_all($this->limit);
        $this->data['articles_recent'] = $this->article_m->get_all_archive();
        $this->data['total_rows'] = $this->db->count_all_results('articles');
        $this->data['limit'] = $this->limit;
        $this->data['curr_template'] = $this->page_m->get_current_theme();
        $this->data['curr_style'] = $this->page_m->get_current_theme();
    }

    private function _homepage() {
        $this->load->model('article_m');
        $this->db->where('pubdate <=', date('Y-m-d'));
        $this->data['articles_recent'] = $this->article_m->get_all_archive();
        $this->db->limit(2);
        $this->data['articles'] = $this->article_m->get();
        $this->data['getdata'] = $this->uri->segment(2);
        $this->data['curr_template'] = $this->page_m->get_current_theme();
        $this->data['curr_style'] = $this->page_m->get_current_theme();
    }

    private function _page() {
        $this->data['articles_recent'] = $this->article_m->get_all_archive();
        $this->load->model('article_m');
        $this->db->where('pubdate <=', date('Y-m-d'));
        $this->db->limit(3);
        $this->data['articles'] = $this->article_m->get();
        $this->data['getdata'] = $this->uri->segment(2);
        $this->data['curr_template'] = $this->page_m->get_current_theme();
        $this->data['curr_style'] = $this->page_m->get_current_theme();
    }

    private function _contact() {
        $this->data['articles_recent'] = $this->article_m->get_all_archive();
        $this->load->model('article_m');
        $this->db->where('pubdate <=', date('Y-m-d'));
        $this->db->limit(3);
        $this->data['articles'] = $this->article_m->get();
        $this->data['getdata'] = $this->uri->segment(2);
        $this->data['curr_template'] = $this->page_m->get_current_theme();
        $this->data['curr_style'] = $this->page_m->get_current_theme();
    }

    private function _about() {
        $this->data['articles_recent'] = $this->article_m->get_all_archive();
        $this->load->model('article_m');
        $this->db->where('pubdate <=', date('Y-m-d'));
        $this->db->limit(3);
        $this->data['articles'] = $this->article_m->get();
        $this->data['getdata'] = $this->uri->segment(2);
        $this->data['curr_template'] = $this->page_m->get_current_theme();
        $this->data['curr_style'] = $this->page_m->get_current_theme();
    }

    private function _gallery_photo() {

        //$this->data['articles'] = $this->article_m->get_all($this->limit);
        //$this->data['total_rows'] = $this->db->count_all_results('articles');
        //$this->data['limit'] = $this->limit;
        $this->load->library('pagination');
        $this->data['limit'] = 6;
        $this->data['articles_recent'] = $this->article_m->get_all_archive();
        $this->data['get_category'] = $this->gallery_photo_m->get_all_gp($this->data['limit']);
        //$this->data['gallery_photo'] = $this->gallery_photo_m->get_all_gp(4);
        //print_r($this->data['gallery_photo']);
        $this->data['getdata'] = $this->uri->segment(2);

        $this->data['total_rows'] = $this->db->count_all_results('kat_photo');
        $this->data['curr_template'] = $this->page_m->get_current_theme();
        $this->data['curr_style'] = $this->page_m->get_current_theme();
    }

    private function _gallery_photo_detail() {

        $this->load->helper('url');
        $id = $this->uri->segment(2);
        //dump($id);
        $this->load->library('pagination');
        $this->data['limit'] = 6;
        $this->data['total_rows'] = $this->gallery_photo_m->get_all_photo_by($id);
        //dump($this->data['total_rows']);
        $this->data['articles_recent'] = $this->article_m->get_all_archive();
        $this->data['get_category'] = $this->gallery_photo_m->get_cat();
        $this->data['list_photo'] = $this->gallery_photo_m->get_list_photo($id);
        $this->data['gallery_photo'] = $this->gallery_photo_m->get_all_gp($this->data['limit']);
        $this->data['getdata'] = $this->uri->segment(2);
        $this->data['curr_template'] = $this->page_m->get_current_theme();
        $this->data['curr_style'] = $this->page_m->get_current_theme();
    }

    private function _gallery_video() {
        $this->load->library('pagination');
        //$this->data['articles'] = $this->article_m->get_all($this->limit);
        $this->data['total_rows'] = $this->db->count_all_results('gallery_video');
        $this->data['limit'] = 6;
        $this->data['articles_recent'] = $this->article_m->get_all_archive();
        $this->data['gallery_video'] = $this->gallery_video_m->get_all_gv($this->data['limit']);
        //dump($this->data['gallery_video']);
        $this->data['getdata'] = $this->uri->segment(2);
        $this->data['curr_template'] = $this->page_m->get_current_theme();
        $this->data['curr_style'] = $this->page_m->get_current_theme();
    }

    private function _gallery_video_detail() {
        $id = $this->uri->segment(3);
        $this->data['articles_recent'] = $this->article_m->get_all_archive();
        $this->data['gallery_video'] = $this->gallery_video_m->get();
        $this->data['getdata'] = $this->uri->segment(2);
        $this->data['curr_template'] = $this->page_m->get_current_theme();
        $this->data['curr_style'] = $this->page_m->get_current_theme();
    }

}
