<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Team extends MY_Controller {

	/**
	 * Contact US Controller
	 */
	
	public function __construct()
    {
        $this->seo_id = 9;
    	// Call the Model constructor latest_product
        parent::__construct();
    }

    // Default Page
    public function index()
    {
        global $config;

        // $this->layout_data['title'] = 'Phase3kicking | Kicking Coaches | college football coaches';
        // $this->layout_data['meta_data']['keywords'] = '';
        // $this->layout_data['meta_data']['description'] = 'Phase 3 kicking coaches are experienced in American football and have coached amateur to professional level kickers. Best college football coaches evaluation Team.';
        // Get banner
        $param['where']['banner_id'] =6;
        $data['banner'] = $this->model_banner->find_one($param);
        $data['about_us'] = $this->model_cms_page->get_page(6);
        $data['content1'] = $this->model_cms_page->get_page(13);
        $data['team'] = $this->model_team->find_all_active();
        $paramnavheading['order'] = 'nav_bar_number';
        $data['main_nav_headings'] = $this->model_nav_bar->find_all($paramnavheading);
        // Load View
        $this->load_view("index", $data);
    }



}
