<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Field_goal_ranking extends MY_Controller {

	/**
	 * CSL Achievements page
	 *
	 * @package		field_goal_ranking
	 *
     * @version		1.0 --
     * @since		Version 1.0 2017
	 */

    public $_list_data = array();

	public function __construct() {

		global $config;
		
		parent::__construct();
        $this->dt_params['dt_headings'] = "field_goal_ranking_id,field_goal_ranking_position,field_goal_ranking_year,field_goal_ranking_title,field_goal_ranking_last_name,field_goal_ranking_state,field_goal_ranking_last_camp_attended,field_goal_ranking_commited,field_goal_ranking_createdon,field_goal_ranking_prospect,field_goal_ranking_status";
        $this->dt_params['searchable'] = array("field_goal_ranking_id","field_goal_ranking_year","field_goal_ranking_title","field_goal_ranking_category","field_goal_ranking_latest_featured","field_goal_ranking_status");
        
        $this->dt_params['action'] = array(
        								"hide_add_button" => false ,
                                        "hide" => false ,
                                        "show_delete" => true ,
                                        "show_edit" => true ,
                                        "order_field" => false ,
                                        "show_view" => false ,
                                        "extra" => array() ,
                                      );
        $this->_list_data['field_goal_ranking_status'] = array( 
                                        STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"
                                    );
        $this->_list_data['field_goal_ranking_latest_featured'] = array( 
                                        STATUS_INACTIVE => "<span class=\"label label-default\">No</span>" ,  
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Yes</span>"  
                                    );
        // Following are common so, defined in MY_Controller_Admin
		// $this->dt_params['paginate']['class'] = $config['js_config']['ci_class'];
		// $this->dt_params['paginate']['uri'] = "paginate";
		// $this->dt_params['paginate']['update_status_uri'] = "update_status";

		// For use IN JS Files

		$config['js_config']['paginate'] = $this->dt_params['paginate'];


        /*$this->_list_data['field_goal_ranking_page'] = array(
            'home'=>'Home',
            'wireless'=>'Wireless',
            'accessories'=>'Accessories',
            'about_us'=>'About Us',
            'field_goal_ranking_info'=>'field_goal_ranking & Info',
            'contact_us'=>'Contact Us',
        );*/
         // $this->_list_data['field_goal_ranking_category'] = $this->model_field_goal_ranking_category->find_all_list_active(array(),"field_goal_ranking_category_name");


		$this->_list_data['field_goal_ranking_year'] = $this->model_field_goal_year->find_all_list_active(array(),"field_goal_year_title");
		//$this->_list_data['field_goal_ranking_product_id'] = $this->model_product->find_all_list_active(array(),"product_name");

		$_POST = $this->input->post(NULL, false);
	}

	public function add($id='', $data=array())
	{
        $param['where']['field_goal_ranking_id'] = $_POST['field_goal_ranking_id'];
        // $param['order'] = 'field_goal_ranking_id desc';
        $last_pos = $this->model_field_goal_ranking->find_one($param);
        //debug($last_pos,1);

        // if(!empty($_POST)){
        //     // debug($_POST,1);
        // $_POST['field_goal_ranking']['field_goal_ranking_position'] = $last_pos['field_goal_ranking_id']+1;
        // }

        // debug($data['kicker_ranking_position'],1);

        // debug($data,1);
		parent::add($id, $data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
