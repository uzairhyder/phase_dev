<?
class Model_headings extends MY_Model
{
    /**
     * TKD headings MODEL
     *
     * @package     headings Model
     * @version     1.0
     * @since       2017
     */

    protected $_table = 'headings';
    protected $_field_prefix = 'headings_';
    protected $_pk = 'headings_id';
    protected $_status_field = 'headings_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "headings_id,headings_page_name,headings_title,headings_status";

        parent::__construct();
    }
    public function get_total_count($params = array() , $keyword='')
    {

      // debug($keyword,1);

      // For search
      if(!empty($keyword)){
      $params['where_like'][] = array(
        'column'=>'headings_title',
        'value'=>$keyword,
        'type'=>'both',
        );
      }

      $params['joins'][] = array(
            'table' => 'headings_category',
            'joint' => 'headings_category.headings_category_id = headings.headings_category',
            'type' => 'right'
        );  


      // $params['where']['headings_id'] = $id;
      // Set params
      $params['order'] = 'headings_id DESC';


      return $this->find_count_active($params);
    }

    // Get pagination data
    public function get_pagination_data($limit = '', $offset = '', $param = array() ,$keyword = '')
    {
      $prefix = $this->db->dbprefix;

      $param['fields'] = "*,(select count(*) from yt_comment where comment_post_id=headings_id and comment_status=1) as comments_count";

      // LEFT JOIN
     $param['joins'][] = array(
            'table' => 'headings_category',
            'joint' => 'headings_category.headings_category_id = headings.headings_category',
            'type' => 'right'
        ); 
      // For search
      if(!empty($_GET['search'])  && $_GET['search'] != ''){
        $param['where_like'][] = array(
          'column'=>'headings_title',
          'value'=>$keyword,
          'type'=>'both',
        );
      }
      $param['order'] = 'headings_id DESC';
      $param['limit'] = $limit;
      $param['offset'] = $offset;

      // debug($param,1);
      
      // Query data
      $data = $this->find_all_active($param);
       // debug($data,1);

      return $data;
    }

    public function get_page_headings($page='')
    {
        // Set params
        $params['fields'] = 'headings_page,headings_title,headings_category,headings_image_path,headings_image,headings_status';
        $params['where']['headings_page'] = $page;
        return $this->model_headings->find_one_active($params);

    }

    // Check slug exists or not
    public function find_by_slug($slug)
    {
        $prefix = $this->db->dbprefix;

        // Set params

        /*$param['fields'] = "headings_id,headings_name,headings_slug,headings_detail,headings_image,headings_image_thumb,headings_image_path,headings_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = headings_id and comment_status=1) AS total_comments,headings_category_name";*/

        $param['fields'] = "headings_id,headings_title,headings_slug,headings_detail,headings_image,headings_image_thumb,headings_image_path,headings_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = headings_id and comment_status=1) AS total_comments";



        // LEFT JOIN

        /*$param['joins'][] = array(

            "table"=>"headings_category" ,

            "joint"=>"headings_category.headings_category_id = headings.headings_category_id and headings_category.headings_category_status =1",

            "type"=>"left"

        );*/



        $param['where']['headings_slug'] = $slug;

        // Query

        $result = $this->find_one_active($param);



        // Return result;

        return $result;

    }

    // Get news comments
    public function get_comments($slug)
    {
        // Set params
        $params['fields'] = "headings_id,headings_title,comment_post_id,comment_name,comment_description,comment_created_on";
        $params['where']['headings_slug'] = $slug;
        // Join
        $params['joins'][] = array(
            "table"=>"comment" ,
            "joint"=>"headings.headings_id = comment_post_id and comment_status=1",
        );
        $params['order'] = 'comment_id DESC';

        return $this->model_headings->find_all_active($params);
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

            'headings_id' => array(
                'table' => $this->_table,
                'name' => 'headings_id',
                'label' => 'id #',
                'type' => 'hidden',
                'type_dt' => 'text',
                'attributes' => array(),
                'dt_attributes' => array("width" => "5%"),
                'js_rules' => '',
                'rules' => 'trim'
            ),

           // 'headings_category' => array(
           //       'table'   => $this->_table,
           //       'name'   => 'headings_category',
           //       'label'   => 'Category',
           //       'type'   => 'dropdown',
           //       'list_data' => array(),
           //       'attributes'   => array(),
           //       'js_rules'   => 'required',
           //       'rules'   => 'required|trim'
           //   ),

            'headings_page_name' => array(
                     'table'   => $this->_table,
                     'name'   => 'headings_page_name',
                     'label'   => 'Page Name',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
            ),
        


              'headings_title' => array(
                     'table'   => $this->_table,
                     'name'   => 'headings_title',
                     'label'   => 'Title',
                     'type'   => 'text',
                     'attributes'   => array("additional"=>'slugify="#'.$this->_table.'-'.$this->_field_prefix.'slug"'),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),

             

               

           
            'headings_status' => array(
                'table' => $this->_table,
                'name' => 'headings_status',
                'label' => 'Status?',
                'type' => 'switch',
                'type_dt' => 'switch',
                'type_filter_dt' => 'dropdown',
                'list_data' => array(),
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