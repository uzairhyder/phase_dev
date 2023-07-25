<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//Include Admin Wrapper. Break down things abit
include_once(APPPATH . "core/MY_Controller_Account.php");

class Product extends MY_Controller_Account {
    const JQUERY_FILE_UPLOAD = "jquery-file-upload";

    /**
     * Achievements page
     *
     * @package		category
     *
     * @version		1.0
     * @since		Version 1.0 2017
     */

    public $_list_data = array();

    public function __construct() {

        global $config;

        parent::__construct();

         if($this->user_type != STATUS_DELETE){
             redirect(g('base_url'));
         }

        $this->class_name = $this->router->fetch_class();
        $this->view_pre = 'account/'.$this->class_name.'/';

        $this->_list_data['product_category_id'] = $this->model_category->find_all_list_active(array(),"category_name");
        $this->_list_data['product_brand_id'] = $this->model_brand->find_all_list_active(array(),"brand_name");
        //$this->_list_data['product_department_id'] = $this->model_department->find_all_list_active(array(),"department_name");
        
        $_POST = $this->input->post(NULL, false);
        
    }


    // Listing/Data table page
    public function index()
    {
        //$this->register_plugins(array("datatables2"));
        $this->register_plugins(array("datatables"));

        $this->view_pre = 'account/seller_dashboard/default/';
        $class_name = $this->class_name;//$this->router->class;
        $model_name = "model_".$class_name;
        $model_obj = $this->$model_name ;


        $data['user_id'] = $this->userid;
        $data['class'] = $class_name;
        $data['model'] = $model_obj;
        $data['title'] = humanize($this->class_name).' Management';
        $data['add_link'] = l('seller_dashboard/'.$this->class_name.'/add/');

        // Data Script
        $data['datatable'] = $this->model_product->get_data_by_user_id($this->userid);
        $data['heading'] = array('product_id','product_category_id','product_name','product_status');
        $this->_list_data['product_status'] = array(
            STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,
            STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"
        );
        


        $this->load_view("datatable" , $data);

    }


    public function add($id='' , $data = array())
    {
        global $config;

        $this->add_script(array(
            "account/jquery.validate.js" ,
            "account/form-validation-script.js",
            "account/tkd_script.js",
            "account/metronic.js",
            "account/quick-sidebar.js",
            "account/demo.js",
            "account/ui-alert-dialog-api.js",
            "account/layout.js",
        ) , "js" );

        $this->register_plugins(array("jquery-file-upload","bootstrap-switch","select2","bootbox","ckeditor"));
        $this->view_pre = 'account/seller_dashboard/product/';
        $insert_mode = FALSE;
        if(isset($_POST) AND array_filled($_POST)) {
            $_POST['product']['product_user_id'] = $this->userid;
            if(empty($_POST['product']['product_id'])){
                $insert_mode = TRUE;
                $_POST['product']['product_createdon'] = date("Y-m-d h:m:s");
                //$_POST['product']['product_status'] = 0;
            }
        }
        
        $this->prevent_return_on_success = TRUE;
        $insertId = parent::add($id,$data);
        // if($insert_mode) {
        //     $this->model_email->notification_article($insertId);
        // }
        if($insertId > 0)
            $this->add_redirect_success($insertId);
    }

    public function before_add_render(&$data)
    {
        // FOR CHILD META TAG HIDDEN START
        //if($data['form_data']['cms_page']['cms_page_page'] > 1)
        if(1==1)
        {
            $data['form_fields']['product']['product_user_id']['type'] = 'hidden';
            $data['form_fields']['product']['product_user_id']['default'] = $this->session->userdata('userdata')['signup_id'];
            //$data['form_fields']['product']['product_user_id']['type'] = 'hidden';
            //$data['form_fields']['product']['product_is_featured']['type'] = 'hidden';
        }
        // FOR CHILD META TAG HIDDEN END

    }

    public function add_redirect_success($id)
    {
        $this->account_current = "seller_dashboard/".$this->router->fetch_class('') .'/'.$this->router->fetch_method('') . "/";
        switch($_POST['submit'])
        {

            case "SaveNEdit":
                $path = $this->account_current.$id;
            break;
            case "SaveNNew":
                $path = $this->account_current;
            break;
            default:
                //$path = "account/".$this->router->fetch_class('') .'/';
                $path = $this->account_current;
            break;
        }
        if(!empty($id)){
            redirect($path."?msgtype=success&msg=".urlencode('Product updated.'), 'refresh');
        }
        else{
            redirect($path."?msgtype=success&msg=".urlencode('Product added.'), 'refresh');
        }
        return $id;
    }


    public function get_list()
    {
        $id = $this->input->post("search_val"); 
        $param['fields'] = "category_id,category_name";
        $param['where']['category_parent_id'] = $id ;
        $data = $this->_list_data['product_category_id'] = $this->model_category->find_all_active($param);
        echo json_encode($data);
    }


    // Delete Music
    public function ajax_delete()
    {
        if(isset($_POST) AND array_filled($_POST))
        {
            $id = intval($_POST['id']);

            $this->model_product->update_by_pk($id,array('product_status' => 2));

            $json_param['status'] = true;
            echo json_encode($json_param);
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
