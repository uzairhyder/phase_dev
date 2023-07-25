<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About_us extends MY_Controller {

	/**
	 * Contact US Controller
	 */
	
	public function __construct()
    {
        $this->seo_id = 2;
    	// Call the Model constructor latest_product
        parent::__construct();
    }

    // Default Page
    public function index()
    {
        global $config;

        // $this->layout_data['title'] = 'phase3kicking | Football Camps | Football kicking camps';
        // $this->layout_data['meta_data']['keywords'] = '';
        // $this->layout_data['meta_data']['description'] = 'Our youth football camps and football kicking camps offer the best football lessons that will improve your game in no time.';


        // Get banner
        $param['where']['banner_id'] =2;
        $data['banner'] = $this->model_banner->find_one($param);
        $data['about_us'] = $this->model_cms_page->get_page(2);
        $data['content1'] = $this->model_cms_page->get_page(11);
        $data['content2'] = $this->model_cms_page->get_page(12);
        //debug($data['about_us'],1);
        $paramnavheading['order'] = 'nav_bar_number';
        $data['main_nav_headings'] = $this->model_nav_bar->find_all($paramnavheading);
        // Load View
        $this->load_view("index", $data);
    }



}
