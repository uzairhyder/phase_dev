<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Terms_and_conditions extends MY_Controller {

	/**
	 * Terms_of_service Controller
	 */
	
	public function __construct()
    {
    	// Call the Model constructor latest_product
        parent::__construct();
    }

    // Default Page
    public function index()
    {
        global $config;
        //$data['banner'] = $this->model_inner_banner->get_banner(2);
        // Get and set cms data
        $data['content'] = $this->model_cms_page->get_page(5);
        // Set banner heading
        //$data['banner_heading'] = "Terms and Conditions";
        // Load View
        $this->load_view("index", $data);
    }



}
