<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Camp extends MY_Controller {

	/**
	 * Contact US Controller
	 */
	
	public function __construct()
    {
        $this->seo_id = 3;
    	// Call the Model constructor latest_product
        parent::__construct();
    }

    // Default Page
    public function index()
    {
        global $config;

        // $this->layout_data['title'] = 'Football camps 2021 | Upcoming camps | Phase 3 kicking';
        // $this->layout_data['meta_data']['keywords'] = '';
        // $this->layout_data['meta_data']['description'] = 'Brace yourself for the upcoming Phase 3 kicking football camps 2021, get enrolled as fast as you can before the slots fill in.';
        // Get banner
        $param['where']['banner_id'] =9;
        $data['banner'] = $this->model_banner->find_one($param);
        $data['about_us'] = $this->model_cms_page->get_page(6);
        // $param1['order'] = 'camp_date asc';
        // $data['upcoming_camp'] = $this->model_camp->find_all_active($param1);

        $parayear['order'] = 'camp_year_id DESC';
        $data['camp_year'] = $this->model_camp_year->find_all_active($parayear);
        // debug($data['camp_year'],1);
        $paramhead['order'] = 'nav_bar_number';
        $data['main_nav_headings'] = $this->model_nav_bar->find_all($paramhead);
        // Load View
        $this->load_view("index", $data);
    }



}
