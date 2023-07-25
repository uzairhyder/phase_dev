<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Snapper_ranking extends MY_Controller {

	/**
	 * CSL Achievements page
	 *
	 * @package		snapper_ranking
	 *
     * @version		1.0 --
     * @since		Version 1.0 2017
	 */

    public $_list_data = array();

	public function __construct() {

		global $config;
		
		parent::__construct();
        $this->dt_params['dt_headings'] = "snapper_ranking_id,snapper_ranking_position,snapper_ranking_year,snapper_ranking_title,snapper_ranking_last_name,snapper_ranking_state,snapper_ranking_last_camp_attended,snapper_ranking_commited,snapper_ranking_createdon,snapper_ranking_prospect,snapper_ranking_status";
        $this->dt_params['searchable'] = array("snapper_ranking_id","snapper_ranking_year","snapper_ranking_title","snapper_ranking_category","snapper_ranking_latest_featured","snapper_ranking_status");
        
        $this->dt_params['action'] = array(
        								"hide_add_button" => false ,
                                        "hide" => false ,
                                        "show_delete" => true ,
                                        "show_edit" => true ,
                                        "order_field" => false ,
                                        "show_view" => false ,
                                        "extra" => array() ,
                                      );
        $this->_list_data['snapper_ranking_status'] = array( 
                                        STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"
                                    );
        $this->_list_data['snapper_ranking_latest_featured'] = array( 
                                        STATUS_INACTIVE => "<span class=\"label label-default\">No</span>" ,  
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Yes</span>"  
                                    );
        // Following are common so, defined in MY_Controller_Admin
		// $this->dt_params['paginate']['class'] = $config['js_config']['ci_class'];
		// $this->dt_params['paginate']['uri'] = "paginate";
		// $this->dt_params['paginate']['update_status_uri'] = "update_status";

		// For use IN JS Files

		$config['js_config']['paginate'] = $this->dt_params['paginate'];


        /*$this->_list_data['snapper_ranking_page'] = array(
            'home'=>'Home',
            'wireless'=>'Wireless',
            'accessories'=>'Accessories',
            'about_us'=>'About Us',
            'snapper_ranking_info'=>'snapper_ranking & Info',
            'contact_us'=>'Contact Us',
        );*/
         // $this->_list_data['snapper_ranking_category'] = $this->model_snapper_ranking_category->find_all_list_active(array(),"snapper_ranking_category_name");


		$this->_list_data['snapper_ranking_year'] = $this->model_snapper_year->find_all_list_active(array(),"snapper_year_title");
		//$this->_list_data['snapper_ranking_product_id'] = $this->model_product->find_all_list_active(array(),"product_name");

		$_POST = $this->input->post(NULL, false);
	}

	public function add($id='', $data=array())
	{

        // debug($_POST,1);
        $param['where']['snapper_ranking_id'] = $_POST['snapper_ranking_id'];
        // $param['order'] = 'field_goal_ranking_id desc';
        $last_pos = $this->model_snapper_ranking->find_one($param);
        // debug($last_pos,1);

        // if(!empty($_POST)){
        //     debug($_POST,1);
        // $_POST['snapper_ranking']['snapper_ranking_position'] = $last_pos['snapper_ranking_id']+1;
        // }

		parent::add($id, $data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
