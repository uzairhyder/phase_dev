<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
        
//Include Admin Wrapper. Break down things abit
//include_once(APPPATH . "core/MY_Controller.php");

/**
 * Controller Wrapper Class.
 *
 * @package
 * @author
 * @version        1.0
 * @since        Version 1.0 2017
 * @comments    Please think of it as fun :P AND ENJOY
 */
class MY_Controller_Account extends MY_Controller
{
    public $navigation_data = array();
    
    public function __construct()
    {
        global $config;
        parent::__construct();

        //$this->login_redirect_check_front();
        

        $this->view_pre = 'account/seller_dashboard/';
        //$this->layout = "my_plain_account";
        $this->add_script(array("seller.css"));
        //$this->user_type = $this->layout_data['user_data']['user_type'];
        //$this->navigation_data = $this->get_navigation();

        //$this->register_plugins(array("bootstrap-toastr","common_files","my_cart"));
        //$this->package_id = $this->layout_data['user_data']['user_package_id'];
        //$this->register_plugins(array("flag_sprites"));

        // Country Code for Flag Sprites
        $country_code = empty($this->layout_data['user_data']['ui_country_id']) ? 223 : $this->layout_data['user_data']['ui_country_id'];
        $this->layout_data['country'] = $this->model_country->get_country_name($country_code);


    }

    public function get_navigation()
    {
        $class = $this->router->fetch_class('');
        $method = $this->router->fetch_method('');

        $data = array();
        
        $data[] = array(
            'is_dropdown' => false,
            'is_dashboard'=>false,
            'class'=>$class=='dashboard' ? 'active' : '',
            'href'=>l('account-area'),
            'icon' => 'fa fa-list',
            'name' => 'Dashboard',
            );

        
        $data[] = array(
            'is_dropdown' => false,
            'is_dashboard'=>true,
            'class'=>($class=='profile' AND $method == 'index') ? 'active' : '',
            'href'=>l('account-area/profile/edit'),
            'icon' => 'fa fa-user',
            'name' => 'Account Info',
            );

        $data[] = array(
            'is_dropdown' => false,
            'is_dashboard'=>true,
            'class'=>$method=='change_password' ? 'active' : '',
            'href'=>l('account-area/change-password'),
            'icon' => 'fa fa-key',
            'name' => 'Password Change',
            );

        

        $data[] = array(
            'is_dropdown' => false,
            'is_dashboard'=>false,
            'class'=>$method=='address_info' ? 'active' : '',
            'href'=>l('account-area/address-info'),
            'icon' => 'fa fa-map',
            'name' => 'Address Info',
            );

        $data[] = array(
            'is_dropdown' => false,
            'is_dashboard'=>false,
            'class'=>$method=='about_us' ? 'active' : '',
            'href'=>l('account-area/change-profile'),
            'icon' => 'fa fa-edit',
            'name' => 'About',
            );

        $data[] = array(
            'is_dropdown' => false,
            'is_dashboard'=>false,
            'class'=>$method=='product' ? 'active' : '',
            'href'=>l('account/product'),
            'icon' => 'fa fa-cart-plus',
            'name' => 'Product Management',
            );
        
        $data[] = array(
            'is_dropdown' => false,
            'is_dashboard'=>true,
            'class'=>$class=='order' ? 'active' : '',
            'href'=>l('account-area/my-order'),
            'icon' => 'fa fa-book',
            'name' => 'My Orders',
            );


        // $data[] = array(
        //     'is_dropdown' => false,
        //     'is_dashboard'=>true,
        //     'class'=>$method=='inquiry_threading_listing' ? 'active' : '',
        //     'href'=>l('track-order'),
        //     'icon' => 'fa fa-map-marker',
        //     'name' => 'Track Order ',
        //     );
        
        /*

        $data[] = array(
            'is_dropdown' => false,
            'is_dashboard'=>true,
            'class'=>$method=='inquiry_threading_listing' ? 'active' : '',
            'href'=>l('account-area/my-ticket'),
            'icon' => 'fa fa-envelope',
            'name' => 'My Ticket',
            );
        */
        $data[] = array(
            'is_dropdown' => false,
            'is_dashboard'=>false,
            'class'=>'',
            'href'=>l(''),
            'icon' => 'fa fa-reply',
            'name' => 'Go to Home Page',
            );

        $data[] = array(
            'is_dropdown' => false,
            'is_dashboard'=>true,
            'class'=>'',
            'href'=>l('signout'),
            'icon' => 'fa fa-lock',
            'name' => 'Logout',
            );

        return $data;
    }

    /*
    * Redirect If not logged in.
    * Access for all user {Factory/Supplier/Factory Employee}
    */
    public function login_redirect_check_front()
    {
        global $config;
        $login_session = $this->session->userdata('logged_in_front');
        
        if(isset($login_session) AND array_filled($login_session))
        {
            return true;
        }
        else
        {
            //redirect("/login");
            redirect(l('login')."?msgtype=error&msg=".urlencode('Please login first'),true);
            exit();
        }
    }



}

// END Controller class

/* End of file Controller.php */
/* Location: ./system/core/Controller.php */
