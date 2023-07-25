<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Seo_plugin extends MY_Controller {

	/**
	 * CSL Achievements page
	 *
	 * @package		banner
	 *
     * @version		1.0 --
     * @since		Version 1.0 2017
	 */

    public $_list_data = array();

	public function __construct() {

		global $config;
		
		parent::__construct();
        $this->dt_params['dt_headings'] = "sp_id,sp_name,sp_meta_title,sp_status";
        $this->dt_params['searchable'] = explode(",", $this->dt_params['dt_headings']);
        // $this->form_params['action'] = array(
        //     'hide_save_new' => true
        // );        
        $this->dt_params['action'] = array(
        								"hide_add_button" => true,
                                        "hide" => false ,
                                        "show_delete" => false,
                                        "show_edit" => true ,
                                        "order_field" => false ,
                                        "show_view" => false ,
                                        "extra" => array() ,
                                      );
        $this->_list_data['sp_status'] = array( 
                                        STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"
                                    );


		$config['js_config']['paginate'] = $this->dt_params['paginate'];


   
		$_POST = $this->input->post(NULL, true);
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
