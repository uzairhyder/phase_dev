<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Camp_result extends MY_Controller {

	/**
	 * Contact US Controller
	 */
	
	public function __construct()
    {
        $this->seo_id = 4;
    	// Call the Model constructor latest_product
        parent::__construct();
    }

    // Default Page
    public function index()
    {
        global $config;

        // $this->layout_data['title'] = 'Football camp results | College football results | P3kicking';
        // $this->layout_data['meta_data']['keywords'] = '';
        // $this->layout_data['meta_data']['description'] = 'View all the college football progress and also the football camp results. All the results are based on realistic evaluation by phase 3 kicking.';

        // Get banner
        $param['where']['banner_id'] =10;
        $data['banner'] = $this->model_banner->find_one($param);
        $data['about_us'] = $this->model_cms_page->get_page(6);

        $para['order'] = 'camp_year_id DESC';
        $data['camp_year'] = $this->model_camp_year->find_all_active($para);
    // debug($data['camp_year'],1);
        $para8['where']['headings_id'] = 8;
        $data['heading8'] = $this->model_headings->find_one($para8);
        // debug($data['camp_year'],1);

        $paramnavheading['order'] = 'nav_bar_number';
        $data['main_nav_headings'] = $this->model_nav_bar->find_all($paramnavheading);
        // Load View
        $this->load_view("index", $data);
    }



}
