<?
class Model_recent_product extends MY_Model {
  
    /**
     * Inquiry MODEL
     *
     * @package     recent_product Model
     * 
     * @version     1.0
     * @since       2017 / Amazingly corrupt models Corporation Inc.
     */

    protected $_table    = 'recent_product';
    protected $_field_prefix    = 'recent_product_';
    protected $_pk    = 'recent_product_id';
    protected $_status_field    = 'recent_product_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "
        recent_product_id,
        recent_product_pid,
        recent_product_user_id,
        recent_product_createdon,
        recent_product_status";
        parent::__construct();
    }

    // Save record
    public function save_record($user_id=0, $product_id=0)
    {
        $data['recent_product_user_id'] = $user_id;
        $data['recent_product_pid'] = $product_id;
        $data['recent_product_status'] = STATUS_ACTIVE;

        $this->set_attributes($data);
        $this->save();
    }

    /*
    * table       Table Name
    * Name        FIeld Name
    * label       Field Label / Textual Representation in form and DT headings
    * type        Field type : hidden, text, textarea, editor, etc etc. 
    *                           Implementation in form_generator.php
    * type_dt     Type used by prepare_datatables method in controller to prepare DT value
    *                           If left blank, prepare_datatable Will opt to use 'type'
    * attributes  HTML Field Attributes
    * js_rules    Rules to be aplied in JS (form validation)
    * rules       Server side Validation. Supports CI Native rules
    */
    public function get_fields( $specific_field = "" )
    {

        $fields = array(
        
              'recent_product_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'recent_product_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),
              // 'recent_product_firstname' => array(
              //    'table'   => $this->_table,
              //    'name'   => 'recent_product_firstname',
              //    'label'   => 'Fisrt Name',
              //    'type'   => 'text',
              //    'attributes'   => array(),
              //    'js_rules'   => '',
              //    'rules'   => 'strtolower|trim|htmlentities|min_length[2]|max_length[10]'
              // ),
              // 'recent_product_lastname' => array(
              //    'table'   => $this->_table,
              //    'name'   => 'recent_product_lastname',
              //    'label'   => 'Last Name',
              //    'type'   => 'text',
              //    'attributes'   => array(),
              //    'js_rules'   => '',
              //    'rules'   => 'strtolower|trim|htmlentities|min_length[2]|max_length[10]'
              // ),
            'recent_product_pid' => array(
                'table'   => $this->_table,
                'name'   => 'recent_product_pid',
                'label'   => 'Product ID',
                'type'   => 'text',
                'attributes'   => array(),
                'js_rules'   => '',
                'rules'   => 'strtolower|trim|htmlentities'
            ),
            'recent_product_user_id' => array(
                'table'   => $this->_table,
                'name'   => 'recent_product_user_id',
                'label'   => 'User ID',
                'type'   => 'text',
                'attributes'   => array(),
                'js_rules'   => '',
                'rules'   => 'strtolower|trim|htmlentities'
            ),

              'recent_product_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'recent_product_status',
                     'label'   => 'Status',
                     'type'   => 'switch',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt'   => 'dropdown',
                     'list_data' => array( 
                                        0 => "<span class=\"label label-danger\">Read</span>" ,
                                        1 =>  "<span class=\"label label-primary\">Unread</span>"  
                                    ) ,
                     'default'   => '1',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"7%"),
                     'rules'   => 'trim'
                  ),


            /*'recent_product_createdon' => array(
                'table'   => $this->_table,
                'name'   => 'recent_product_createdon',
                'label'   => 'Created',
                'type'   => 'none',
                'type_dt'   => 'text',
                'attributes'   => array(),
                'dt_attributes'   => array("width"=>"10%"),
                'js_rules'   => '',
                'rules'   => 'trim'
            ),*/
              
            );

        if($specific_field)
            return $fields[ $specific_field ];
        else
            return $fields;

    }

}
?>