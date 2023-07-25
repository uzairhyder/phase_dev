<?
class Model_help extends MY_Model
{
    /**
     * help MODEL
     *
     * @package     help Model
     * @version     1.0
     * @since       2017
     */

    protected $_table = 'help';
    protected $_field_prefix = 'help_';
    protected $_pk = 'help_id';
    protected $_status_field = 'help_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "help_id,help_title,help_status";

        parent::__construct();
    }

    public function get_page_help($page='')
    {
        // Set params
        $params['fields'] = 'help_id,help_title,help_status';
        $params['where']['help_page'] = $page;
        return $this->model_help->find_one_active($params);

    }
    public function get_help_type($type)
    {
        return $this->_list_data['help_type'][$type];
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
    public function get_fields($specific_field = "")
    {
        // Use when add new image
        $is_required_image = (($this->uri->segment(4)!=null) && intval($this->uri->segment(4)))?'':'required';

        $fields = array(

            'help_id' => array(
                'table' => $this->_table,
                'name' => 'help_id',
                'label' => 'id #',
                'type' => 'hidden',
                'type_dt' => 'text',
                'attributes' => array(),
                'dt_attributes' => array("width" => "5%"),
                'js_rules' => '',
                'rules' => 'trim'
            ),


            // 'help_type' => array(
            //          'table'   => $this->_table,
            //          'name'   => 'help_type',
            //          'label'   => 'Question Type',
            //          'type'   => 'dropdown',
            //          'attributes'   => array(),
            //          'js_rules'   => 'required',
            //          'list_data'    => $this->_list_data['help_type'] ,
            //          'rules'   => 'required|trim|htmlentities'
            //       ),


              'help_title' => array(
                     'table'   => $this->_table,
                     'name'   => 'help_title',
                     'label'   => 'Question',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),



            'help_content' => array(
                'table' => $this->_table,
                'name' => 'help_content',
                'label' => 'Answer ',
                'type' => 'editor',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),

            


            // 'help_is_featured' => array(
            //     'table' => $this->_table,
            //     'name' => 'help_is_featured',
            //     'label' => 'Is Featured?',
            //     'type' => 'switch',
            //     'type_dt' => 'dropdown',
            //     'type_filter_dt' => 'dropdown',
            //     'list_data_key' => "help_is_featured" ,
            //     'list_data'=> array() ,
            //     'default' => '1',
            //     'attributes' => array(),
            //     'dt_attributes' => array("width" => "7%"),
            //     'rules' => 'trim'
            // ),

            'help_status' => array(
                'table' => $this->_table,
                'name' => 'help_status',
                'label' => 'Status?',
                'type' => 'switch',
                'type_dt' => 'switch',
                'type_filter_dt' => 'dropdown',
                'list_data' => array(
                    0 => "<span class='label label-danger'>Inactive</span>" ,
                    1 =>  "<span class='label label-primary'>Active</span>"
                ) ,
                'default' => '1',
                'attributes' => array(),
                'dt_attributes' => array("width" => "7%"),
                'rules' => 'trim'
            ),

        );

        if ($specific_field)
            return $fields[$specific_field];
        else
            return $fields;

    }

}

?>