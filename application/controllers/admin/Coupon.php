<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Coupon extends MY_Controller {

	/**
	 * faq page
	 *
	 * @package		faq
	 *
     * @version		1.0 --
     * @since		Version 1.0 2017
	 */

    public $_list_data = array();

	public function __construct() {

		global $config;
		
		parent::__construct();
        $this->dt_params['dt_headings'] = "coupon_id,coupon_name, coupon_percent,coupon_status";
        $this->dt_params['searchable'] = array("coupon_id","coupon_name","coupon_percent","coupon_status");
        $this->dt_params['action'] = array(
                                        "hide" => false ,
                                        "show_delete" => true ,
                                        "show_edit" => true ,
                                        "order_field" => false ,
                                        "show_view" => false ,
                                        "multi_lang" => false ,
                                        "extra" => array() ,
                                      );
        
        $this->_list_data['coupon_status'] = array( 
                                        STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,  
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"  
                                    );

        
		// For use IN JS Files
		$config['js_config']['paginate'] = $this->dt_params['paginate'];
		
		$_POST = $this->input->post(NULL, false);
		//$language = get_lang_details($_GET);
		//$config['js_config']['paginate']['uri'] .= '?lang=' . $language['lang_id'];
	}

	public function add($id='')
	{
		// Popluated LISTDATA in constructor
		$this->add_script(array( "jquery.validate.js" , "form-validation-script.js") , "js" );
		$this->_list_data['blog_lang'] = array("1"=>"English","2"=>"Arabic");
		parent::add($id);
	}

	public function index()
	{
		// Popluated LISTDATA in constructor
		parent::index();
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
