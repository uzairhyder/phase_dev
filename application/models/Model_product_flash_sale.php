<?

class Model_product_flash_sale extends MY_Model
{
    /**
     *
     * @package     product_flash_sale Model
     *
     * @version     1.0
     * @since       2017
     */

    protected $_table = 'product_flash_sale';
    protected $_field_prefix = 'product_flash_sale_';
    protected $_pk = 'product_flash_sale_id';
    protected $_status_field = 'product_flash_sale_status';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        // Call the Model constructor
        //$this->pagination_params['fields'] = "product_flash_sale_id,product_flash_sale_category_id,product_flash_sale_subcategory_id,product_flash_sale_childcategory_id,product_flash_sale_name,product_flash_sale_stock,product_flash_sale_price,CONCAT(product_flash_sale_image_path,product_flash_sale_image) AS product_flash_sale_image,product_flash_sale_status";
        //$this->pagination_params['fields'] = "product_flash_sale_id,product_flash_sale_category_id,product_flash_sale_name,product_flash_sale_is_featured,product_flash_sale_status";
        $this->pagination_params['fields'] = "product_flash_sale_id,product_flash_sale_status";


        /*
                $this->pagination_params['joins'][] = array(
                                                            "table"=>"category as pcat",
                                                            "joint"=>"pcat.category_id = product_flash_sale.product_flash_sale_category_id"
                                                            );



                $this->pagination_params['joins'][] = array(
                                                            "table"=>"category as scat",
                                                            "joint"=>"scat.category_id = product_flash_sale.product_flash_sale_subcategory_id"
                                                            );



                $this->pagination_params['joins'][] = array(
                                                            "table"=>"category as ccat",
                                                            "joint"=>"ccat.category_id = product_flash_sale.product_flash_sale_childcategory_id"
                                                            );

        */

        /*        $this->pagination_params['joins'][] = array(
                    "table"=>"category" ,
                    "joint"=>"category.category_id = product_flash_sale.product_flash_sale_category_id",
                    // add left to get import records
                    "type"=>"left"
                );*/


        /*$this->relations['product_flash_sale_price'] = array(
            "type"     =>"has_many",
            "own_key"  =>"pp_product_flash_sale_id",
            "other_key"=>"pp_price_id",
        );


        $this->relations['product_flash_sale_color'] = array(
            "type"=>"has_many",
            "own_key"=>"mba_product_flash_sale_id",   // item_category column
            "other_key"=>"mba_color_id", // item_category column
        );*/

        /*$this->relations['product_flash_sale_prep_size'] = array(
            "type"     =>"has_many",
            "own_key"  =>"pp_product_flash_sale_id",
            "other_key"=>"pp_prep_id",
        );*/

        $this->relations['product_sale'] = array(
            "type"=>"has_many",
            "own_key"=>"mba_flash_sale_id",   // item_category column
            "other_key"=>"mba_product_id", // item_category column
        );

        parent::__construct();

    }

    // Get all records (hot sale)
    public function flash_sale()
    {
        //$param['fields '] = "product_id,product_name,product_slug,product_price,product_old_price,product_image_path,product_image_thumb,product_status";
        // JOIN
        $param['joins'][] = array(
            "table"=>"product_sale" ,
            "joint"=>"product_sale.mba_flash_sale_id = product_flash_sale.product_flash_sale_id",
        );
        $param['joins'][] = array(
            "table"=>"product" ,
            "joint"=>"product.product_id = product_sale.mba_product_id and product_status = 1",
        );
        $param['where']['product_flash_sale_status'] = STATUS_ACTIVE;
        $result = $this->find_all_active($param);

        return $result;
    }

    public function get_fields($specific_field = "")
    {
        // Use when add new image
        $is_required_image = (($this->uri->segment(4) != null) && intval($this->uri->segment(4))) ? '' : 'required';


        $fields['product_flash_sale_id'] = array(
            'table' => $this->_table,
            'name' => 'product_flash_sale_id',
            'label' => 'ID',
            'type' => 'hidden',
            'type_dt' => 'text',
            'attributes' => array(),
            'dt_attributes' => array("width" => "5%"),
            'js_rules' => '',
            'rules' => 'trim'
        );

        $fields['product_flash_sale_timer'] = array(
            //'table' => (isset($_POST['signup']['signup_category'])) ? $this->_table : 'product_color_id',
            //'table' => $this->_table,
            'table' => $this->_table,
            'name' => 'product_flash_sale_timer',
            'label' => 'Products',
            'type' => 'date',
            'attributes' => array(),
            /*'js_rules' => 'required',
            'rules' => 'required',*/
            // 'js_rules' => ($this->router->directory=='admin/') ? '' : 'required',
            // 'rules' => ($this->router->directory=='admin/') ? '' : 'required',
            //'list_data'=>$this->model_signup->find_all_list_active(array(),"product_name")
        );

        $fields['product_sale'] = array(
            //'table' => (isset($_POST['signup']['signup_category'])) ? $this->_table : 'product_color_id',
            //'table' => $this->_table,
            'table' => 'product_sale',
            'name' => 'mba_product_id',
            'label' => 'Products',
            'type' => 'multiselect',
            'attributes' => array(),
            /*'js_rules' => 'required',
            'rules' => 'required',*/
            // 'js_rules' => ($this->router->directory=='admin/') ? '' : 'required',
            // 'rules' => ($this->router->directory=='admin/') ? '' : 'required',
            'list_data'=>$this->model_product->find_all_list_active(array(),"product_name")
        );

        $fields['product_flash_sale_status'] =  array(

        'table' => $this->_table,

        'name' => 'product_flash_sale_status',

        'label' => 'Status?',

        'type' => 'switch',

        'default' => '1',

        'attributes' => array(),

        'rules' => 'trim'

    );




        if ($specific_field)
            return $fields[$specific_field];
        else
            return $fields;
    }

}

?>