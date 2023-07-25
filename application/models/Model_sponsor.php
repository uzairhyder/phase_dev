<?
class Model_sponsor extends MY_Model {
    /**
     * sponsor MODEL
     *
     * @package     sponsor Model
     * @author      
     * @version     1.0
     * @since       2017
     */

    protected $_table    = 'sponsor';
    protected $_field_prefix    = 'sponsor_';
    protected $_pk    = 'sponsor_id';
    protected $_status_field    = 'sponsor_status';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "sponsor_id,sponsor_title,sponsor_link,
        CONCAT(sponsor_image_path,sponsor_image) AS sponsor_image,sponsor_status";
        
        parent::__construct();

    }

    // Get all active sponsors
    public function get_sponsor()
    {
        // Set params
        $params['fields'] = "sponsor_name, sponsor_name, sponsor_designation, sponsor_description, sponsor_image, sponsor_image_path";
        // Get result
        $result = $this->model_sponsor->find_all_active($params);

        return $result;
    }


    


    /*
    * table             Table Name
    * Name              FIeld Name
    * label             Field Label / Textual Representation in form and DT headings
    * type              Field type : hidden, text, textarea, editor, etc etc. 
    *                                 Implementation in form_generator.php
    * type_dt           Type used by prepare_datatables method in controller to prepare DT value
    *                                 If left blank, prepare_datatable Will opt to use 'type'
    * type_filter_dt    Used by DT FILTER PREPRATION IN datatables.php
    * attributes        HTML Field Attributes
    * js_rules          Rules to be aplied in JS (form validation)
    * rules             Server side Validation. Supports CI Native rules

    * list_data         For dropdown etc, data in key-value pair that will populate dropdown 
    *                   -----USED IN ADMIN_CONTROLLER AND admin's database.php
    * list_data_key     For dropdown etc, if you want to define list_data in CONTROLLER (public _list_data[$key]) list_data_key is the $key which identifies it
    *                   -----Incase list_data_key is not defined, it will look for field_name as a $key
    *                   -----USED IN ADMIN_CONTROLLER AND admin's database.php
    */
    public function get_fields( $specific_field = "" )
    {

        $is_required_image = (($this->uri->segment(4)!=null) && intval($this->uri->segment(4)))?'':'required';

        $fields = array(
            
          'sponsor_id' => array(
           'table'   => $this->_table,
           'name'   => 'sponsor_id',
           'label'   => 'id #',
           'type'   => 'hidden',
           'type_dt'   => 'text',
           'attributes'   => array(),
           'dt_attributes'   => array("width"=>"5%"),
           'js_rules'   => '',
           'rules'   => 'trim'
       ),


      'sponsor_title' => array(
           'table'   => $this->_table,
           'name'   => 'sponsor_title',
           'label'   => 'Text',
           'type'   => 'text',
           'attributes'   => array(),
           'js_rules'   => 'required',
           'rules'   => 'required|trim|htmlentities'
       ),

          'sponsor_link' => array(
           'table'   => $this->_table,
           'name'   => 'sponsor_link',
           'label'   => 'Link',
           'type'   => 'text',
           'attributes'   => array(),
           'js_rules'   => 'required',
           'rules'   => 'required|trim|htmlentities'
       ),



          'sponsor_image' => array(
           'table'   => $this->_table,
           'name'   => 'sponsor_image',
           'label'   => 'Image',
           'name_path'   => 'sponsor_image_path',
           'upload_config'   => 'site_upload_sponsor',
           'type'   => 'fileupload',
           'type_dt'   => 'image',
           'randomize' => true,
           'preview'   => 'true',
           'attributes'   => array('image_size'=>'Recommended image size : 96px × 96px','allow_ext'=>'png|jpeg|jpg',),
           'dt_attributes'   => array("width"=>"10%"),
           'rules'   => 'trim|htmlentities',
           'js_rules'=>$is_required_image
       ),



          'sponsor_status' => array(
           'table'   => $this->_table,
           'name'   => 'sponsor_status',
           'label'   => 'Status?',
           'type'   => 'switch',
           'type_dt'   => 'dropdown',
           'type_filter_dt' => 'dropdown',
           'list_data_key' => "sponsor_status" ,
           'list_data' => array(),
           'default'   => '1',
           'attributes'   => array(),
           'dt_attributes'   => array("width"=>"7%"),
           'rules'   => 'trim'
       ),
          
      );
        
        if($specific_field)
            return $fields[ $specific_field ];
        else
            return $fields;
    }

}
?>