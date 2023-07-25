<?
class Model_nav_bar extends MY_Model
{
    /**
     * TKD nav_bar MODEL
     *
     * @package     nav_bar Model
     * @version     1.0
     * @since       2017
     */

    protected $_table = 'nav_bar';
    protected $_field_prefix = 'nav_bar_';
    protected $_pk = 'nav_bar_id';
    protected $_status_field = 'nav_bar_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "nav_bar_id,nav_bar_number,nav_bar_title";

        parent::__construct();
    }
    public function get_total_count($params = array() , $keyword='')
    {

      // debug($keyword,1);

      // For search
      if(!empty($keyword)){
      $params['where_like'][] = array(
        'column'=>'nav_bar_title',
        'value'=>$keyword,
        'type'=>'both',
        );
      }

      $params['joins'][] = array(
            'table' => 'nav_bar_category',
            'joint' => 'nav_bar_category.nav_bar_category_id = nav_bar.nav_bar_category',
            'type' => 'right'
        );  


      // $params['where']['nav_bar_id'] = $id;
      // Set params
      $params['order'] = 'nav_bar_id DESC';


      return $this->find_count_active($params);
    }

    // Get pagination data
    public function get_pagination_data($limit = '', $offset = '', $param = array() ,$keyword = '')
    {
      $prefix = $this->db->dbprefix;

      $param['fields'] = "*,(select count(*) from yt_comment where comment_post_id=nav_bar_id and comment_status=1) as comments_count";

      // LEFT JOIN
     $param['joins'][] = array(
            'table' => 'nav_bar_category',
            'joint' => 'nav_bar_category.nav_bar_category_id = nav_bar.nav_bar_category',
            'type' => 'right'
        ); 
      // For search
      if(!empty($_GET['search'])  && $_GET['search'] != ''){
        $param['where_like'][] = array(
          'column'=>'nav_bar_title',
          'value'=>$keyword,
          'type'=>'both',
        );
      }
      $param['order'] = 'nav_bar_id DESC';
      $param['limit'] = $limit;
      $param['offset'] = $offset;

      // debug($param,1);
      
      // Query data
      $data = $this->find_all_active($param);
       // debug($data,1);

      return $data;
    }

    public function get_page_nav_bar($page='')
    {
        // Set params
        $params['fields'] = 'nav_bar_page,nav_bar_title,nav_bar_category,nav_bar_image_path,nav_bar_image,nav_bar_status';
        $params['where']['nav_bar_page'] = $page;
        return $this->model_nav_bar->find_one_active($params);

    }

    // Check slug exists or not
    public function find_by_slug($slug)
    {
        $prefix = $this->db->dbprefix;

        // Set params

        /*$param['fields'] = "nav_bar_id,nav_bar_name,nav_bar_slug,nav_bar_detail,nav_bar_image,nav_bar_image_thumb,nav_bar_image_path,nav_bar_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = nav_bar_id and comment_status=1) AS total_comments,nav_bar_category_name";*/

        $param['fields'] = "nav_bar_id,nav_bar_title,nav_bar_slug,nav_bar_detail,nav_bar_image,nav_bar_image_thumb,nav_bar_image_path,nav_bar_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = nav_bar_id and comment_status=1) AS total_comments";



        // LEFT JOIN

        /*$param['joins'][] = array(

            "table"=>"nav_bar_category" ,

            "joint"=>"nav_bar_category.nav_bar_category_id = nav_bar.nav_bar_category_id and nav_bar_category.nav_bar_category_status =1",

            "type"=>"left"

        );*/



        $param['where']['nav_bar_slug'] = $slug;

        // Query

        $result = $this->find_one_active($param);



        // Return result;

        return $result;

    }

    // Get news comments
    public function get_comments($slug)
    {
        // Set params
        $params['fields'] = "nav_bar_id,nav_bar_title,comment_post_id,comment_name,comment_description,comment_created_on";
        $params['where']['nav_bar_slug'] = $slug;
        // Join
        $params['joins'][] = array(
            "table"=>"comment" ,
            "joint"=>"nav_bar.nav_bar_id = comment_post_id and comment_status=1",
        );
        $params['order'] = 'comment_id DESC';

        return $this->model_nav_bar->find_all_active($params);
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

            'nav_bar_id' => array(
                'table' => $this->_table,
                'name' => 'nav_bar_id',
                'label' => 'id #',
                'type' => 'hidden',
                'type_dt' => 'text',
                'attributes' => array(),
                'dt_attributes' => array("width" => "5%"),
                'js_rules' => '',
                'rules' => 'trim'
            ),

            
                'nav_bar_number' => array(
              'table'   => $this->_table,
              'name'   => 'nav_bar_number',
              'label'   => 'Position',
              'type'   => 'dropdown',
              'list_data'    => array(
               "1"=>"1",
               "2"=>"2",
               "3"=>"3",
               "4"=>"4",
               "5"=>"5",
               "6"=>"6",
               "7"=>"7",
               "8"=>"8",
               "9"=>"9",
               "10"=>"10",
             ) ,
              'attributes'   => array(),
              'js_rules'   => 'required',
              'rules'   => 'required',
            ),
        


              'nav_bar_title' => array(
                     'table'   => $this->_table,
                     'name'   => 'nav_bar_title',
                     'label'   => 'Title',
                     'type'   => 'text',
                     'attributes'   => array("additional"=>'slugify="#'.$this->_table.'-'.$this->_field_prefix.'slug"'),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),
          


         'nav_bar_url' => array(
                     'table'   => $this->_table,
                     'name'   => 'nav_bar_url',
                     'label'   => 'Url',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
            ),

            'nav_bar_status' => array(
                'table' => $this->_table,
                'name' => 'nav_bar_status',
                'label' => 'Status?',
                'type' => 'hidden',
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