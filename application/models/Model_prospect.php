<?
class Model_prospect extends MY_Model
{
    /**
     * TKD prospect MODEL
     *
     * @package     prospect Model
     * @version     1.0
     * @since       2017
     */

    protected $_table = 'prospect';
    protected $_field_prefix = 'prospect_';
    protected $_pk = 'prospect_id';
    protected $_status_field = 'prospect_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "prospect_id,prospect_title,prospect_rating,prospect_status";

        parent::__construct();
    }
    public function get_total_count($params = array() , $keyword='')
    {

      // debug($keyword,1);

      // For search
      if(!empty($keyword)){
      $params['where_like'][] = array(
        'column'=>'prospect_title',
        'value'=>$keyword,
        'type'=>'both',
        );
      }

      $params['joins'][] = array(
            'table' => 'prospect_category',
            'joint' => 'prospect_category.prospect_category_id = prospect.prospect_category',
            'type' => 'right'
        );  


      // $params['where']['prospect_id'] = $id;
      // Set params
      $params['order'] = 'prospect_id DESC';


      return $this->find_count_active($params);
    }

    // Get pagination data
    public function get_pagination_data($limit = '', $offset = '', $param = array() ,$keyword = '')
    {
      $prefix = $this->db->dbprefix;

      $param['fields'] = "*,(select count(*) from yt_comment where comment_post_id=prospect_id and comment_status=1) as comments_count";

      // LEFT JOIN
     $param['joins'][] = array(
            'table' => 'prospect_category',
            'joint' => 'prospect_category.prospect_category_id = prospect.prospect_category',
            'type' => 'right'
        ); 
      // For search
      if(!empty($_GET['search'])  && $_GET['search'] != ''){
        $param['where_like'][] = array(
          'column'=>'prospect_title',
          'value'=>$keyword,
          'type'=>'both',
        );
      }
      $param['order'] = 'prospect_id DESC';
      $param['limit'] = $limit;
      $param['offset'] = $offset;

      // debug($param,1);
      
      // Query data
      $data = $this->find_all_active($param);
       // debug($data,1);

      return $data;
    }

    public function get_page_prospect($page='')
    {
        // Set params
        $params['fields'] = 'prospect_page,prospect_title,prospect_category,prospect_image_path,prospect_image,prospect_status';
        $params['where']['prospect_page'] = $page;
        return $this->model_prospect->find_one_active($params);

    }

    // Check slug exists or not
    public function find_by_slug($slug)
    {
        $prefix = $this->db->dbprefix;

        // Set params

        /*$param['fields'] = "prospect_id,prospect_name,prospect_slug,prospect_detail,prospect_image,prospect_image_thumb,prospect_image_path,prospect_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = prospect_id and comment_status=1) AS total_comments,prospect_category_name";*/

        $param['fields'] = "prospect_id,prospect_title,prospect_slug,prospect_image,prospect_image_thumb,prospect_image_path,prospect_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = prospect_id and comment_status=1) AS total_comments";



        // LEFT JOIN

        /*$param['joins'][] = array(

            "table"=>"prospect_category" ,

            "joint"=>"prospect_category.prospect_category_id = prospect.prospect_category_id and prospect_category.prospect_category_status =1",

            "type"=>"left"

        );*/



        $param['where']['prospect_slug'] = $slug;

        // Query

        $result = $this->find_one_active($param);



        // Return result;

        return $result;

    }

    // Get news comments
    public function get_comments($slug)
    {
        // Set params
        $params['fields'] = "prospect_id,prospect_title,comment_post_id,comment_name,comment_description,comment_created_on";
        $params['where']['prospect_slug'] = $slug;
        // Join
        $params['joins'][] = array(
            "table"=>"comment" ,
            "joint"=>"prospect.prospect_id = comment_post_id and comment_status=1",
        );
        $params['order'] = 'comment_id DESC';

        return $this->model_prospect->find_all_active($params);
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

            'prospect_id' => array(
                'table' => $this->_table,
                'name' => 'prospect_id',
                'label' => 'id #',
                'type' => 'hidden',
                'type_dt' => 'text',
                'attributes' => array(),
                'dt_attributes' => array("width" => "5%"),
                'js_rules' => '',
                'rules' => 'trim'
            ),

           // 'prospect_category' => array(
           //       'table'   => $this->_table,
           //       'name'   => 'prospect_category',
           //       'label'   => 'Category',
           //       'type'   => 'dropdown',
           //       'list_data' => array(),
           //       'attributes'   => array(),
           //       'js_rules'   => 'required',
           //       'rules'   => 'required|trim'
           //   ),
        


              'prospect_title' => array(
                     'table'   => $this->_table,
                     'name'   => 'prospect_title',
                     'label'   => 'Name',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),


               'prospect_rating' => array(
                     'table'   => $this->_table,
                     'name'   => 'prospect_rating',
                     'label'   => 'Rating',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
            ),


            'prospect_status' => array(
                'table' => $this->_table,
                'name' => 'prospect_status',
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