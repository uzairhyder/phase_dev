<?
class Model_field_goal_ranking extends MY_Model
{
    /**
     * TKD field_goal_ranking MODEL
     *
     * @package     field_goal_ranking Model
     * @version     1.0
     * @since       2017
     */

    protected $_table = 'field_goal_ranking';
    protected $_field_prefix = 'field_goal_ranking_';
    protected $_pk = 'field_goal_ranking_id';
    protected $_status_field = 'field_goal_ranking_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        // Call the Model constructor
      $this->pagination_params['fields'] = "field_goal_ranking_id,field_goal_ranking_position,field_goal_ranking_year,field_goal_ranking_title,field_goal_ranking_last_name,field_goal_ranking_state,field_goal_ranking_last_camp_attended,field_goal_ranking_commited,field_goal_ranking_createdon,field_goal_ranking_prospect,field_goal_ranking_status";

      parent::__construct();
    }
    public function get_total_count($params = array() , $keyword='')
    {

      // debug($keyword,1);

      // For search
      if(!empty($keyword)){
        $params['where_like'][] = array(
          'column'=>'field_goal_ranking_title',
          'value'=>$keyword,
          'type'=>'both',
        );
      }

      $params['joins'][] = array(
        'table' => 'field_goal_ranking_category',
        'joint' => 'field_goal_ranking_category.field_goal_ranking_category_id = field_goal_ranking.field_goal_ranking_category',
        'type' => 'right'
      );  


      // $params['where']['field_goal_ranking_id'] = $id;
      // Set params
      $params['order'] = 'field_goal_ranking_id DESC';


      return $this->find_count_active($params);
    }

    // Get pagination data
    public function get_pagination_data($limit = '', $offset = '', $param = array() ,$keyword = '')
    {
      $prefix = $this->db->dbprefix;

      $param['fields'] = "*,(select count(*) from yt_comment where comment_post_id=field_goal_ranking_id and comment_status=1) as comments_count";

      // LEFT JOIN
      $param['joins'][] = array(
        'table' => 'field_goal_ranking_category',
        'joint' => 'field_goal_ranking_category.field_goal_ranking_category_id = field_goal_ranking.field_goal_ranking_category',
        'type' => 'right'
      ); 
      // For search
      if(!empty($_GET['search'])  && $_GET['search'] != ''){
        $param['where_like'][] = array(
          'column'=>'field_goal_ranking_title',
          'value'=>$keyword,
          'type'=>'both',
        );
      }
      $param['order'] = 'field_goal_ranking_id DESC';
      $param['limit'] = $limit;
      $param['offset'] = $offset;

      // debug($param,1);
      
      // Query data
      $data = $this->find_all_active($param);
       // debug($data,1);

      return $data;
    }

    public function get_page_field_goal_ranking($page='')
    {
        // Set params
      $params['fields'] = 'field_goal_ranking_page,field_goal_ranking_title,field_goal_ranking_category,field_goal_ranking_image_path,field_goal_ranking_image,field_goal_ranking_status';
      $params['where']['field_goal_ranking_page'] = $page;
      return $this->model_field_goal_ranking->find_one_active($params);

    }

    // Check slug exists or not
    public function find_by_slug($slug)
    {
      $prefix = $this->db->dbprefix;

        // Set params

        /*$param['fields'] = "field_goal_ranking_id,field_goal_ranking_name,field_goal_ranking_slug,field_goal_ranking_detail,field_goal_ranking_image,field_goal_ranking_image_thumb,field_goal_ranking_image_path,field_goal_ranking_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = field_goal_ranking_id and comment_status=1) AS total_comments,field_goal_ranking_category_name";*/

        $param['fields'] = "field_goal_ranking_id,field_goal_ranking_title,field_goal_ranking_slug,field_goal_ranking_detail,field_goal_ranking_image,field_goal_ranking_image_thumb,field_goal_ranking_image_path,field_goal_ranking_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = field_goal_ranking_id and comment_status=1) AS total_comments";



        // LEFT JOIN

        /*$param['joins'][] = array(

            "table"=>"field_goal_ranking_category" ,

            "joint"=>"field_goal_ranking_category.field_goal_ranking_category_id = field_goal_ranking.field_goal_ranking_category_id and field_goal_ranking_category.field_goal_ranking_category_status =1",

            "type"=>"left"

          );*/



          $param['where']['field_goal_ranking_slug'] = $slug;

        // Query

          $result = $this->find_one_active($param);



        // Return result;

          return $result;

        }

    // Get news comments
        public function get_comments($slug)
        {
        // Set params
          $params['fields'] = "field_goal_ranking_id,field_goal_ranking_title,comment_post_id,comment_name,comment_description,comment_created_on";
          $params['where']['field_goal_ranking_slug'] = $slug;
        // Join
          $params['joins'][] = array(
            "table"=>"comment" ,
            "joint"=>"field_goal_ranking.field_goal_ranking_id = comment_post_id and comment_status=1",
          );
          $params['order'] = 'comment_id DESC';

          return $this->model_field_goal_ranking->find_all_active($params);
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

        'field_goal_ranking_id' => array(
          'table' => $this->_table,
          'name' => 'field_goal_ranking_id',
          'label' => 'id #',
          'type' => 'hidden',
          'type_dt' => 'text',
          'attributes' => array(),
          'dt_attributes' => array("width" => "5%"),
          'js_rules' => '',
          'rules' => 'trim'
        ),
        'field_goal_ranking_position' => array(
         'table'   => $this->_table,
         'name'   => 'field_goal_ranking_position',
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
          "11"=>"11",
          "12"=>"12",
          "13"=>"13",
          "14"=>"14",
          "15"=>"15",
          "16"=>"16",
          "17"=>"17",
          "18"=>"18",
          "19"=>"19",
          "20"=>"20",
          "21"=>"21",
          "22"=>"22",
          "23"=>"23",
          "24"=>"24",
          "25"=>"25",
          "26"=>"26",
          "27"=>"27",
          "28"=>"28",
          "29"=>"29",
          "30"=>"30",
          "31"=>"31",
          "32"=>"32",
          "33"=>"33",
          "34"=>"34",
          "35"=>"35",
          "36"=>"36",
          "37"=>"37",
          "38"=>"38",
          "39"=>"39",
          "40"=>"40",
          "41"=>"41",
          "42"=>"42",
          "43"=>"43",
          "44"=>"44",
          "45"=>"45",
          "46"=>"46",
          "47"=>"47",
          "48"=>"48",
          "49"=>"49",
          "50"=>"50",
          "51"=>"51",
          "52"=>"52",
          "53"=>"53",
          "54"=>"54",
          "55"=>"55",
          "56"=>"56",
          "57"=>"57",
          "58"=>"58",
          "59"=>"59",
          "60"=>"60",
          "61"=>"61",
          "62"=>"62",
          "63"=>"63",
          "64"=>"64",
          "65"=>"65",
          "66"=>"66",
          "67"=>"67",
          "68"=>"68",
          "69"=>"69",
          "70"=>"70",
          "71"=>"71",
          "72"=>"72",
          "73"=>"73",
          "74"=>"74",
          "75"=>"75",
          "76"=>"76",
          "77"=>"77",
          "78"=>"78",
          "79"=>"79",
          "80"=>"80",
          "81"=>"81",
          "82"=>"82",
          "83"=>"83",
          "84"=>"84",
          "85"=>"85",
          "86"=>"86",
          "87"=>"87",
          "88"=>"88",
          "89"=>"89",
          "90"=>"90",
          "91"=>"91",
          "92"=>"92",
          "93"=>"93",
          "94"=>"94",
          "95"=>"95",
          "96"=>"96",
          "97"=>"97",
          "98"=>"98",
          "99"=>"99",
          "100"=>"100",
        ) ,
         'attributes'   => array(),
         'js_rules'   => '',
         'rules'   => '',
       ),

        'field_goal_ranking_year' => array(
         'table'   => $this->_table,
         'name'   => 'field_goal_ranking_year',
         'label'   => 'Graduation Year',
         'type'   => 'dropdown',
         'list_data' => array(),
         'attributes'   => array(),
         'js_rules'   => 'required',
         'rules'   => 'required|trim'
       ),
        


        'field_goal_ranking_title' => array(
         'table'   => $this->_table,
         'name'   => 'field_goal_ranking_title',
         'label'   => 'First Name',
         'type'   => 'text',
         'attributes'   => array("additional"=>'slugify="#'.$this->_table.'-'.$this->_field_prefix.'slug"'),
         'js_rules'   => 'required',
         'rules'   => 'required|trim|htmlentities'
       ),

        'field_goal_ranking_last_name' => array(
         'table'   => $this->_table,
         'name'   => 'field_goal_ranking_last_name',
         'label'   => 'Last Name',
         'type'   => 'text',
         'attributes'   => array(),
         'js_rules'   => 'required',
         'rules'   => 'required|trim|htmlentities'
       ),

       

       // 'field_goal_ranking_graduation_year' => array(
       //   'table'   => $this->_table,
       //   'name'   => 'field_goal_ranking_graduation_year',
       //   'label'   => 'Graduation Year',
       //   'type'   => 'dropdown',
       //   'list_data'    => array(
       //    "1990"=>"1990",
       //    "1991"=>"1991",
       //    "1992"=>"1992",
       //    "1993"=>"1993",
       //    "1994"=>"1994",
       //    "1995"=>"1995",
       //    "1996"=>"1996",
       //    "1997"=>"1997",
       //    "1998"=>"1998",
       //    "1999"=>"1999",
       //    "2000"=>"2000",
       //    "2001"=>"2001",
       //    "2002"=>"2002",
       //    "2003"=>"2003",
       //    "2004"=>"2004",
       //    "2005"=>"2005",
       //    "2006"=>"2006",
       //    "2007"=>"2007",
       //    "2008"=>"2008",
       //    "2009"=>"2009",
       //    "2010"=>"2010",
       //    "2011"=>"2011",
       //    "2012"=>"2012",
       //    "2013"=>"2013",
       //    "2014"=>"2014",
       //    "2015"=>"2015",
       //    "2016"=>"2016",
       //    "2017"=>"2017",
       //    "2018"=>"2018",
       //    "2019"=>"2019",
       //    "2020"=>"2020",
       //    "2021"=>"2021",
       //    "2022"=>"2022",
       //    "2023"=>"2023",
       //    "2024"=>"2024",
       //    "2025"=>"2025",
       //    "2026"=>"2026",
       //    "2027"=>"2027",
       //    "2028"=>"2028",
       //    "2029"=>"2029",
       //    "2030"=>"2030",
       //    "2031"=>"2031",
       //    "2032"=>"2032",
       //    "2033"=>"2033",
       //    "2034"=>"2034",
       //    "2035"=>"2035"
       //  ) ,
       //   'attributes'   => array(),
       //   'js_rules'   => 'required',
       //   'rules'   => 'required',
       // ),

              // 'field_goal_ranking_slug'  => array(
              //     'table'   => $this->_table,
              //     'name'   => 'field_goal_ranking_slug',
              //     'label'   => 'Slug',
              //     'type'   => 'text',
              //     'attributes'   => array(),
              //     'js_rules'   => array("is_slug" => array() ),
              //     'rules'   => 'required|htmlentities|strtolower|is_unique['.$this->_table.'.'.$this->_field_prefix.'slug]|callback_is_slug'
              // ),

        'field_goal_ranking_state' => array(
         'table'   => $this->_table,
         'name'   => 'field_goal_ranking_state',
         'label'   => 'State',
         'type'   => 'text',
         'attributes'   => array(),
         'js_rules'   => 'required',
         'rules'   => 'required|trim|htmlentities'
       ),

        'field_goal_ranking_offers' => array(
          'table' => $this->_table,
          'name' => 'field_goal_ranking_offers',
          'label' => 'Offers',
          'type' => 'text',
          'attributes' => array(),
          'js_rules' => '',
          'rules' => 'trim|htmlentities'
        ),

        'field_goal_ranking_commited' => array(
          'table' => $this->_table,
          'name' => 'field_goal_ranking_commited',
          'label' => 'committed',
          'type' => 'text',
          'attributes' => array(),
          'js_rules' => '',
          'rules' => 'trim|htmlentities'
        ),


        'field_goal_ranking_last_camp_attended'=>array(
          'table'   => $this->_table,
          'name'   => 'field_goal_ranking_last_camp_attended',
          'label'   => 'Last Camp Attended - Format <br> (Month/Date/Year)',
          // 'type'   => 'date',
          'type' => 'text',
          'type_dt'   => 'date',
        //   'default'=>date("m/d/Y"),
          'attributes'   => array(),
          'js_rules'   => '',
          'rules'   => 'required|trim|htmlentities',
         ),

        'field_goal_ranking_prospect' => array(
         'table'   => $this->_table,
         'name'   => 'field_goal_ranking_prospect',
         'label'   => 'Prospect',
         'type'   => 'dropdown',
         'list_data'    => array(
          "7"=>"D1 FBS Power 5 Ready",
          "6"=>"D1 FBS Group 5 Ready",
          "5"=>"D1 FBS Ready",
          "4.5"=>"D1 FCS Ready",
          "4"=>"D2 Ready",
          "3.5"=>"D2 Potential",
          "3"=>"D3 Ready",
          "2.5"=>"Developing with Minor Adjustments",
          "2"=>"Still Developing"
        ) ,
         'attributes'   => array(),
         'js_rules'   => '',
         'rules'   => '',
       ),





          //   'field_goal_ranking_short_detail' => array(
          //       'table' => $this->_table,
          //       'name' => 'field_goal_ranking_short_detail',
          //       'label' => 'Short Description',
          //       'type' => 'textarea',
          //       'attributes' => array(),
          //       'js_rules' => 'required',
          //       'rules' => 'required|trim|htmlentities'
          //   ),

          // 'field_goal_ranking_detail' => array(
          //       'table' => $this->_table,
          //       'name' => 'field_goal_ranking_detail',
          //       'label' => 'Long Description',
          //       'type' => 'editor',
          //       'attributes' => array(),
          //       'js_rules' => 'required',
          //       'rules' => 'required|trim|htmlentities'
          //   ),

          //   'field_goal_ranking_image' => array(
          //       'table' => $this->_table,
          //       'name' => 'field_goal_ranking_image',
          //       'label' => 'Image',
          //       'name_path' => 'field_goal_ranking_image_path',
          //       'upload_config' => 'site_upload_field_goal_ranking',
          //       'type' => 'fileupload',
          //       'type_dt' => 'image',
          //       'randomize' => true,
          //       'preview' => 'true',
          //       // 'thumb'   => array(array('name'=>'field_goal_ranking_image_thumb','max_width'=>470, 'max_height'=>316),),
          //       'attributes'   => array(
          //           'image_size_recommended'=>'720px × 310px',
          //           'allow_ext'=>'png|jpeg|jpg',
          //       ),
          //       'dt_attributes' => array("width" => "10%"),
          //       'rules' => 'trim|htmlentities',
          //       'js_rules'=>$is_required_image
          //   ),
            // 'field_goal_ranking_image_detail1' => array(
            //     'table' => $this->_table,
            //     'name' => 'field_goal_ranking_image_detail1',
            //     'label' => 'Image 1 Detail Page',
            //     'name_path' => 'field_goal_ranking_image_path',
            //     'upload_config' => 'site_upload_field_goal_ranking',
            //     'type' => 'fileupload',
            //     'type_dt' => 'image',
            //     'randomize' => true,
            //     'preview' => 'true',

            //     'attributes'   => array(
            //         'image_size_recommended'=>'540px × 370px',
            //         'allow_ext'=>'png|jpeg|jpg',
            //     ),
            //     'dt_attributes' => array("width" => "10%"),
            //     'rules' => 'trim|htmlentities',
            //    // 'js_rules'=>$is_required_image
            // ),
            // 'field_goal_ranking_image_detail2' => array(
            //     'table' => $this->_table,
            //     'name' => 'field_goal_ranking_image_detail2',
            //     'label' => 'Image 2 Detail Page',
            //     'name_path' => 'field_goal_ranking_image_path',
            //     'upload_config' => 'site_upload_field_goal_ranking',
            //     'type' => 'fileupload',
            //     'type_dt' => 'image',
            //     'randomize' => true,
            //     'preview' => 'true',

            //     'attributes'   => array(
            //         'image_size_recommended'=>'540px × 370px',
            //         'allow_ext'=>'png|jpeg|jpg',
            //     ),
            //     'dt_attributes' => array("width" => "10%"),
            //     'rules' => 'trim|htmlentities',
            //    // 'js_rules'=>$is_required_image
            // ),
            // 'field_goal_ranking_image_detail12' => array(
            //     'table' => $this->_table,
            //     'name' => 'field_goal_ranking_image_detail12',
            //     'label' => 'Image 3 Detail Page',
            //     'name_path' => 'field_goal_ranking_image_path',
            //     'upload_config' => 'site_upload_field_goal_ranking',
            //     'type' => 'fileupload',
            //     'type_dt' => 'image',
            //     'randomize' => true,
            //     'preview' => 'true',

            //     'attributes'   => array(
            //         'image_size_recommended'=>'540px × 370px',
            //         'allow_ext'=>'png|jpeg|jpg',
            //     ),
            //     'dt_attributes' => array("width" => "10%"),
            //     'rules' => 'trim|htmlentities',
            //    // 'js_rules'=>$is_required_image
            // ),

         /*'field_goal_ranking_by' => array(
                'table' => $this->_table,
                'name' => 'field_goal_ranking_by',
                'label' => 'By',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
              ),*/

     // 'field_goal_ranking_latest_featured' => array(
     //            'table' => $this->_table,
     //            'name' => 'field_goal_ranking_latest_featured',
     //            'label' => 'Is Featured?',
     //            'type' => 'switch',
     //            'type_dt' => 'dropdown',
     //            'type_filter_dt' => 'dropdown',
     //            'list_data_key' => "field_goal_ranking_latest_featured" ,
     //            'list_data' => array(),
     //            'default' => '0',
     //            'attributes' => array(),
     //            'dt_attributes' => array("width" => "7%"),
     //            'rules' => 'trim'
     //        ),
      // 'field_goal_ranking_createdon'=>array(
      //     'table'   => $this->_table,
      //     'name'   => 'field_goal_ranking_createdon',
      //     'label'   => 'Created Date',
      //     'type'   => 'datetime',
      //     'default'=>date("m/d/Y"),
      //     'attributes'   => array(),
      //     'js_rules'   => '',
      //     'rules'   => '',
      //    ),

         'field_goal_ranking_createdon'=>array(
          'table'   => $this->_table,
          'name'   => 'field_goal_ranking_createdon',
          'label'   => 'Created Date',
          'type'   => 'none',
          'type_dt'   => 'text',
          'attributes'   => array(),
          'js_rules'   => '',
          'rules'   => '',
         ),
         
              'field_goal_ranking_status' => array(
                'table' => $this->_table,
                'name' => 'field_goal_ranking_status',
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