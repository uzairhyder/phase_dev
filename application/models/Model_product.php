<?

class Model_product extends MY_Model
{
    /**
     *
     * @package     product Model
     *
     * @version     1.0
     * @since       2017
     */

    protected $_table = 'product';
    protected $_field_prefix = 'product_';
    protected $_pk = 'product_id';
    protected $_status_field = 'product_status';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        // Call the Model constructor
        //$this->pagination_params['fields'] = "product_id,product_category_id,product_subcategory_id,product_childcategory_id,product_name,product_stock,product_price,CONCAT(product_image_path,product_image) AS product_image,product_status";
        //$this->pagination_params['fields'] = "product_id,product_category_id,product_name,product_is_featured,product_status";
        $this->pagination_params['fields'] = "product_id,product_category_id,product_name,product_is_best_deal,product_is_week,product_hot_sale,product_is_search,product_status";


        /*
                $this->pagination_params['joins'][] = array(
                                                            "table"=>"category as pcat",
                                                            "joint"=>"pcat.category_id = product.product_category_id"
                                                            );



                $this->pagination_params['joins'][] = array(
                                                            "table"=>"category as scat",
                                                            "joint"=>"scat.category_id = product.product_subcategory_id"
                                                            );



                $this->pagination_params['joins'][] = array(
                                                            "table"=>"category as ccat",
                                                            "joint"=>"ccat.category_id = product.product_childcategory_id"
                                                            );

        */

        /*        $this->pagination_params['joins'][] = array(
                    "table"=>"category" ,
                    "joint"=>"category.category_id = product.product_category_id",
                    // add left to get import records
                    "type"=>"left"
                );*/


        /*$this->relations['product_price'] = array(
            "type"     =>"has_many",
            "own_key"  =>"pp_product_id",
            "other_key"=>"pp_price_id",
        );


        $this->relations['product_color'] = array(
            "type"=>"has_many",
            "own_key"=>"mba_product_id",   // item_category column
            "other_key"=>"mba_color_id", // item_category column
        );*/

        /*$this->relations['product_prep_size'] = array(
            "type"     =>"has_many",
            "own_key"  =>"pp_product_id",
            "other_key"=>"pp_prep_id",
        );*/

        parent::__construct();

    }

    // Get all records (best deals)
    public function best_deals()
    {
        $param['fields '] = "product_id,product_name,product_slug,product_price,product_old_price,product_image_path,product_image_thumb,product_status";
        $param['where']['product_is_best_deal'] = STATUS_ACTIVE;
        $result = $this->find_all_active($param);

        return $result;
    }

    // Get all records (product weeek)
    public function product_week()
    {
        $param['fields '] = "product_id,product_name,product_slug,product_price,product_old_price,product_image_path,product_image_thumb,product_status";
        $param['where']['product_is_week'] = STATUS_ACTIVE;
        $param['limit'] = 10;
        $result = $this->find_all_active($param);

        return $result;
    }
    // Get all records (hot sale)
    public function hot_sale()
    {
        $param['fields '] = "product_id,product_name,product_slug,product_price,product_old_price,product_image_path,product_image_thumb,product_status";
        $param['where']['product_hot_sale'] = STATUS_ACTIVE;
        $result = $this->find_all_active($param);

        return $result;
    }
    // Get all records (Recent view)
    public function recent_views($user_id = 0)
    {
        $param['fields '] = "product_id,product_name,product_slug,product_price,product_old_price,product_image_path,product_image_thumb,product_status";
        // JOIN
        $param['joins'][] = array(
            "table"=>"product" ,
            "joint"=>"product.product_id = recent_product_pid",
        );
        $param['where']['recent_product_user_id'] = $user_id;
        $param['where']['product_status'] = STATUS_ACTIVE;
        $param['group'] = "recent_product_pid";
        $param['order'] = "recent_product_id";
        $result = $this->model_recent_product->find_all($param);

        return $result;
    }
    // Get all records (hot sale)
    public function popular_search()
    {
        $param['fields '] = "product_id,product_name,product_slug,product_price,product_old_price,product_image_path,product_image_thumb,product_status";
        $param['where']['product_is_search'] = STATUS_ACTIVE;
        $result = $this->find_all_active($param);

        return $result;
    }

    // Get Price by records
    public function get_count_by_price()
    {
        $price_1_params['where']['product_price >= '] = 1;
        $price_1_params['where']['product_price <= '] = 100;
        $price_1 = $this->find_count_active($price_1_params);
        //echo  $this->db->last_query();exit;
        $price_2_params['where']['product_price >= '] = 101;
        $price_2_params['where']['product_price <= '] = 200;
        $price_2 = $this->find_count_active($price_2_params);
        $price_3_params['where']['product_price >= '] = 201;
        $price_3_params['where']['product_price <= '] = 300;
        $price_3 = $this->find_count_active($price_3_params);
        $price_4_params['where']['product_price >= '] = 301;
        $price_4_params['where']['product_price <= '] = 400;
        $price_4 = $this->find_count_active($price_4_params);
        $price_5_params['where']['product_price >= '] = 401;
        $price_5_params['where']['product_price <= '] = 500;
        $price_5 = $this->find_count_active($price_5_params);

        $price_all_param['where']['product_price >  '] = 600;
        $price_all = $this->find_count_active($price_all_param);

        return array($price_1, $price_2, $price_3, $price_4, $price_5, $price_all);
    }

    public function get_feature_products()
    {
        $params['where']['product_is_featured'] = STATUS_ACTIVE;
        $result = $this->find_all_active($params);

        return $result;
    }

    public function get_total_count_accessories($params = array(), $keyword = '', $category_id = 0)
    {

        // debug($keyword,1);

        // For search
        if (!empty($keyword)) {
            $params['where_like'][] = array(
                'column' => 'product_name',
                'value' => $keyword,
                'type' => 'both',
            );
        }
        // For search
        if (!empty($category_id > 0)) {
            $params['where']['category_id'] = $category_id;
        }

        // For Category
        if (!empty($_GET['product_category_id']) && $_GET['product_category_id'] != '') {
            $params['where']['product_category_id'] = $_GET['product_category_id'];
        }
        // For Brand
        if (!empty($_GET['product_brand_id']) && $_GET['product_brand_id'] != '') {
            $params['where']['product_brand_id'] = $_GET['product_brand_id'];
        }
        // For Style
        if (!empty($_GET['product_style_id']) && $_GET['product_style_id'] != '') {
            $params['where']['product_style_id'] = $_GET['product_style_id'];
        }

        /*$params['joins'][] = array(
            'table' => 'category',
            'joint' => 'category.category_id = product.product_category_id',
            'type' => 'right'
        );*/


        $params['where']['product_is_accessories'] = STATUS_ACTIVE;
        // Set params
        // SORT
        if (!empty($_GET['sort']) && $_GET['sort'] != '') {
            $params['order'] = 'product_name ' . $_GET['sort'];
        } else {
            $params['order'] = 'product_id DESC';
        }


        return $this->find_count_active($params);
    }

    // Get pagination data
    public function get_pagination_data_accessories($limit = '', $offset = '', $param = array(), $keyword = '', $category_id = 0)
    {
        $param['fields'] = "product_id,product_category_id,product_name,product_slug,product_price,product_overview,
        product_image,,product_image_thumb,product_image_path,product_createdon,product_type,product_price,product_old_price";
        $prefix = $this->db->dbprefix;

        // LEFT JOIN
        /*$param['joins'][] = array(
            'table' => 'category',
            'joint' => 'category.category_id = product.product_category_id',
            'type' => 'right'
        );*/
        // For search
        if (!empty($_GET['search']) && $_GET['search'] != '') {
            $param['where_like'][] = array(
                'column' => 'product_name',
                'value' => $keyword,
                'type' => 'both',
            );
        }
        // For search
        if (!empty($category_id > 0)) {
            $param['where']['category_id'] = $category_id;
        }

        // For Category
        if (!empty($_GET['product_category_id']) && $_GET['product_category_id'] != '') {
            $param['where']['product_category_id'] = $_GET['product_category_id'];
        }
        // For Brand
        if (!empty($_GET['product_brand_id']) && $_GET['product_brand_id'] != '') {
            $param['where']['product_brand_id'] = $_GET['product_brand_id'];
        }
        // For Style
        if (!empty($_GET['product_style_id']) && $_GET['product_style_id'] != '') {
            $param['where']['product_style_id'] = $_GET['product_style_id'];
        }


        $param['where']['product_is_accessories'] = STATUS_ACTIVE;
        // SORT
        if (!empty($_GET['sort']) && $_GET['sort'] != '') {
            $param['order'] = 'product_name ' . $_GET['sort'];
        } else {
            $param['order'] = 'product_id DESC';
        }
        $param['limit'] = $limit;
        $param['offset'] = $offset;

        // debug($param,1);

        // Query data
        $data = $this->find_all_active($param);
        // debug($data,1);

        return $data;
    }

    public function get_total_count_merchandise($params = array(), $keyword = '', $category_id = 0)
    {

        // debug($keyword,1);

        // For search
        if (!empty($keyword)) {
            $params['where_like'][] = array(
                'column' => 'product_name',
                'value' => $keyword,
                'type' => 'both',
            );
        }
        // For search
        if (!empty($category_id > 0)) {
            $params['where']['category_id'] = $category_id;
        }

        // For Category
        if (!empty($_GET['product_category_id']) && $_GET['product_category_id'] != '') {
            $params['where']['product_category_id'] = $_GET['product_category_id'];
        }
        // For Brand
        if (!empty($_GET['product_brand_id']) && $_GET['product_brand_id'] != '') {
            $params['where']['product_brand_id'] = $_GET['product_brand_id'];
        }
        // For Style
        if (!empty($_GET['product_style_id']) && $_GET['product_style_id'] != '') {
            $params['where']['product_style_id'] = $_GET['product_style_id'];
        }

        /*$params['joins'][] = array(
            'table' => 'category',
            'joint' => 'category.category_id = product.product_category_id',
            'type' => 'right'
        );*/


        $params['where']['product_is_merchandise'] = STATUS_ACTIVE;
        // Set params
        // SORT
        if (!empty($_GET['sort']) && $_GET['sort'] != '') {
            $params['order'] = 'product_name ' . $_GET['sort'];
        } else {
            $params['order'] = 'product_id DESC';
        }


        return $this->find_count_active($params);
    }

    // Get pagination data
    public function get_pagination_data_merchandise($limit = '', $offset = '', $param = array(), $keyword = '', $category_id = 0)
    {
        $param['fields'] = "product_id,product_category_id,product_name,product_slug,product_price,product_overview,
        product_image,,product_image_thumb,product_image_path,product_createdon,product_type,product_price,product_old_price";
        $prefix = $this->db->dbprefix;

        // LEFT JOIN
        /*$param['joins'][] = array(
            'table' => 'category',
            'joint' => 'category.category_id = product.product_category_id',
            'type' => 'right'
        );*/
        // For search
        if (!empty($_GET['search']) && $_GET['search'] != '') {
            $param['where_like'][] = array(
                'column' => 'product_name',
                'value' => $keyword,
                'type' => 'both',
            );
        }
        // For search
        if (!empty($category_id > 0)) {
            $param['where']['category_id'] = $category_id;
        }

        // For Category
        if (!empty($_GET['product_category_id']) && $_GET['product_category_id'] != '') {
            $param['where']['product_category_id'] = $_GET['product_category_id'];
        }
        // For Brand
        if (!empty($_GET['product_brand_id']) && $_GET['product_brand_id'] != '') {
            $param['where']['product_brand_id'] = $_GET['product_brand_id'];
        }
        // For Style
        if (!empty($_GET['product_style_id']) && $_GET['product_style_id'] != '') {
            $param['where']['product_style_id'] = $_GET['product_style_id'];
        }


        $param['where']['product_is_merchandise'] = STATUS_ACTIVE;
        // SORT
        if (!empty($_GET['sort']) && $_GET['sort'] != '') {
            $param['order'] = 'product_name ' . $_GET['sort'];
        } else {
            $param['order'] = 'product_id DESC';
        }
        $param['limit'] = $limit;
        $param['offset'] = $offset;

        // debug($param,1);

        // Query data
        $data = $this->find_all_active($param);
        // debug($data,1);

        return $data;
    }

    public function get_total_count_search($params = array(), $keyword = '', $category_id = 0)
    {

        // debug($keyword,1);

        // For search
        if (!empty($keyword)) {
            $params['where_like'][] = array(
                'column' => 'product_name',
                'value' => $keyword,
                'type' => 'both',
            );
        }
        // For search
        if (!empty($category_id > 0)) {
            $params['where']['category_id'] = $category_id;
        }

        // For Category
        if (!empty($_GET['product_category_id']) && $_GET['product_category_id'] != '') {
            $params['where']['product_category_id'] = $_GET['product_category_id'];
        }
        // For Brand
        if (!empty($_GET['product_brand_id']) && $_GET['product_brand_id'] != '') {
            $params['where']['product_brand_id'] = $_GET['product_brand_id'];
        }
        // For Style
        if (!empty($_GET['product_style_id']) && $_GET['product_style_id'] != '') {
            $params['where']['product_style_id'] = $_GET['product_style_id'];
        }

        /*$params['joins'][] = array(
            'table' => 'category',
            'joint' => 'category.category_id = product.product_category_id',
            'type' => 'right'
        );*/


        //$params['where']['product_is_merchandise'] = STATUS_ACTIVE;
        // Set params
        // SORT
        if (!empty($_GET['sort']) && $_GET['sort'] != '') {
            $params['order'] = 'product_name ' . $_GET['sort'];
        } else {
            $params['order'] = 'product_id DESC';
        }


        return $this->find_count_active($params);
    }

    // Get pagination data
    public function get_pagination_data_search($limit = '', $offset = '', $param = array(), $keyword = '', $category_id = 0)
    {
        $param['fields'] = "product_id,product_category_id,product_name,product_slug,product_price,product_overview,
        product_image,,product_image_thumb,product_image_path,product_createdon,product_type,product_price,product_old_price";
        $prefix = $this->db->dbprefix;

        // LEFT JOIN
        /*$param['joins'][] = array(
            'table' => 'category',
            'joint' => 'category.category_id = product.product_category_id',
            'type' => 'right'
        );*/
        // For search
        if (!empty($_GET['search']) && $_GET['search'] != '') {
            $param['where_like'][] = array(
                'column' => 'product_name',
                'value' => $keyword,
                'type' => 'both',
            );
        }
        // For search
        if (!empty($category_id > 0)) {
            $param['where']['category_id'] = $category_id;
        }

        // For Category
        if (!empty($_GET['product_category_id']) && $_GET['product_category_id'] != '') {
            $param['where']['product_category_id'] = $_GET['product_category_id'];
        }
        // For Brand
        if (!empty($_GET['product_brand_id']) && $_GET['product_brand_id'] != '') {
            $param['where']['product_brand_id'] = $_GET['product_brand_id'];
        }
        // For Style
        if (!empty($_GET['product_style_id']) && $_GET['product_style_id'] != '') {
            $param['where']['product_style_id'] = $_GET['product_style_id'];
        }


        //$param['where']['product_is_merchandise'] = STATUS_ACTIVE;
        // SORT
        if (!empty($_GET['sort']) && $_GET['sort'] != '') {
            $param['order'] = 'product_name ' . $_GET['sort'];
        } else {
            $param['order'] = 'product_id DESC';
        }
        $param['limit'] = $limit;
        $param['offset'] = $offset;

        // debug($param,1);

        // Query data
        $data = $this->find_all_active($param);
        // debug($data,1);

        return $data;
    }

    public function get_total_count($params = array(), $keyword = '', $category_id = 0, $brand_id = 0, $price = '')
    {

        // debug($keyword,1);

        // For search
        if (!empty($keyword)) {
            $params['where_like'][] = array(
                'column' => 'product_name',
                'value' => $keyword,
                'type' => 'both',
            );
        }
        // For search
        if ($brand_id > 0) {
            $params['where']['product_brand_id'] = $brand_id;
        } elseif (!empty($category_id > 0)) {
            $params['where']['category_id'] = $category_id;
        }

        if (!empty($price)) {
            switch ($price) {
                case '1':
                    $params['where']['product_price >= '] = 1;
                    $params['where']['product_price <= '] = 100;
                    break;
                case '2':
                    $params['where']['product_price >= '] = 101;
                    $params['where']['product_price <= '] = 200;
                    break;
                case '3':
                    $params['where']['product_price >= '] = 201;
                    $params['where']['product_price <= '] = 300;
                    break;
                case '4':
                    $params['where']['product_price >= '] = 301;
                    $params['where']['product_price <= '] = 400;
                    break;
                case '5':
                    $params['where']['product_price >= '] = 401;
                    $params['where']['product_price <= '] = 500;
                    break;
                case '6':
                    $params['where']['product_price >  '] = 600;
                    break;
                default:
                    $params['where']['product_price >  '] = 600;
                    break;
            }
        }

        $params['joins'][] = array(
            'table' => 'category',
            'joint' => 'category.category_id = product.product_category_id',
            'type' => 'right'
        );


        // $params['where']['product_id'] = $id;
        // Set params
        $params['order'] = 'product_id DESC';


        return $this->find_count_active($params);
    }

    // Get pagination data
    public function get_pagination_data($limit = '', $offset = '', $param = array(), $keyword = '', $category_id = 0, $brand_id = 0, $price = '')
    {
        $param['fields'] = "product_id,product_category_id,product_name,product_slug,product_price,product_overview,
        product_image,,product_image_thumb,product_image_path,product_createdon,category_name,product_type,product_old_price,product_rated";
        $prefix = $this->db->dbprefix;

        // LEFT JOIN
        $param['joins'][] = array(
            'table' => 'category',
            'joint' => 'category.category_id = product.product_category_id',
            'type' => 'right'
        );
        // For search
        if (!empty($_GET['search']) && $_GET['search'] != '') {
            $param['where_like'][] = array(
                'column' => 'product_name',
                'value' => $keyword,
                'type' => 'both',
            );
        }
        // For search
        if ($brand_id > 0) {
            $param['where']['product_brand_id'] = $brand_id;
        } elseif (!empty($category_id > 0)) {
            $param['where']['category_id'] = $category_id;
        }

        if (!empty($price)) {
            switch ($price) {
                case '1':
                    $param['where']['product_price >= '] = 1;
                    $param['where']['product_price <= '] = 100;
                    break;
                case '2':
                    $param['where']['product_price >= '] = 101;
                    $param['where']['product_price <= '] = 200;
                    break;
                case '3':
                    $param['where']['product_price >= '] = 201;
                    $param['where']['product_price <= '] = 300;
                    break;
                case '4':
                    $param['where']['product_price >= '] = 301;
                    $param['where']['product_price <= '] = 400;
                    break;
                case '5':
                    $param['where']['product_price >= '] = 401;
                    $param['where']['product_price <= '] = 500;
                    break;
                case '6':
                    $param['where']['product_price >  '] = 600;
                    break;
                default:
                    $param['where']['product_price >  '] = 600;
                    break;
            }
        }

        // SORT
        if (!empty($_GET['sort']) && $_GET['sort'] != '') {
            $param['order'] = 'product_name ' . $_GET['sort'];
        } else {
            $param['order'] = 'product_id DESC';
        }

        //$param['order'] = 'product_id DESC';
        $param['limit'] = $limit;
        $param['offset'] = $offset;

        // debug($param,1);

        // Query data
        $data = $this->find_all_active($param);
        // debug($data,1);

        return $data;
    }

    public function get_total_count_promotion($params = array(), $keyword = '', $category_id = 0)
    {

        // debug($keyword,1);

        // For search
        if (!empty($keyword)) {
            $params['where_like'][] = array(
                'column' => 'product_name',
                'value' => $keyword,
                'type' => 'both',
            );
        }
        // For search
        if (!empty($category_id > 0)) {
            $params['where']['category_id'] = $category_id;
        }

        $params['joins'][] = array(
            'table' => 'category',
            'joint' => 'category.category_id = product.product_category_id',
            'type' => 'right'
        );


        $params['where']['product_is_promotion'] = STATUS_ACTIVE;
        // Set params
        $params['order'] = 'product_id DESC';


        return $this->find_count_active($params);
    }

    // Get pagination data
    public function get_promotion_pagination_data($limit = '', $offset = '', $param = array(), $keyword = '', $category_id = 0)
    {
        $param['fields'] = "product_id,product_category_id,product_name,product_slug,product_price,product_overview,
        product_image,,product_image_thumb,product_image_path,product_createdon,category_name";
        $prefix = $this->db->dbprefix;

        // LEFT JOIN
        $param['joins'][] = array(
            'table' => 'category',
            'joint' => 'category.category_id = product.product_category_id',
            'type' => 'right'
        );
        // For search
        if (!empty($_GET['search']) && $_GET['search'] != '') {
            $param['where_like'][] = array(
                'column' => 'product_name',
                'value' => $keyword,
                'type' => 'both',
            );
        }
        // For search
        if (!empty($category_id > 0)) {
            $param['where']['category_id'] = $category_id;
        }
        $param['where']['product_is_promotion'] = STATUS_ACTIVE;
        $param['order'] = 'product_id DESC';
        $param['limit'] = $limit;
        $param['offset'] = $offset;

        // debug($param,1);

        // Query data
        $data = $this->find_all_active($param);
        // debug($data,1);

        return $data;
    }

    public function get_total_count_season($params = array(), $keyword = '', $category_id = 0)
    {

        // debug($keyword,1);

        // For search
        /*if(!empty($keyword)){
            $params['where_like'][] = array(
                'column'=>'product_name',
                'value'=>$keyword,
                'type'=>'both',
            );
        }*/
        // For search
        /*if(!empty($category_id>0)){
            $params['where']['category_id'] = $category_id;
        }

        // For Category
        if(!empty($_GET['product_category_id'])  && $_GET['product_category_id'] != ''){
            $params['where']['product_category_id'] = $_GET['product_category_id'];
        }
        // For Brand
        if(!empty($_GET['product_brand_id'])  && $_GET['product_brand_id'] != ''){
            $params['where']['product_brand_id'] = $_GET['product_brand_id'];
        }
        // For Style
        if(!empty($_GET['product_style_id'])  && $_GET['product_style_id'] != ''){
            $params['where']['product_style_id'] = $_GET['product_style_id'];
        }*/

        /*$params['joins'][] = array(
            'table' => 'category',
            'joint' => 'category.category_id = product.product_category_id',
            'type' => 'right'
        );*/

        // By type
        if (!empty($_GET['type']) && $_GET['type'] == '1') {
            $params['where']['product_is_summer'] = STATUS_ACTIVE;
        } elseif (!empty($_GET['type']) && $_GET['type'] == '2') {
            $params['where']['product_is_winter'] = STATUS_ACTIVE;
        }

        //$params['where']['product_is_merchandise'] = STATUS_ACTIVE;
        // Set params
        // SORT
        if (!empty($_GET['sort']) && $_GET['sort'] != '') {
            $params['order'] = 'product_name ' . $_GET['sort'];
        } else {
            $params['order'] = 'product_id DESC';
        }


        return $this->find_count_active($params);
    }

    // Get pagination data
    public function get_pagination_data_season($limit = '', $offset = '', $param = array(), $keyword = '', $category_id = 0)
    {
        $param['fields'] = "product_id,product_category_id,product_name,product_slug,product_price,product_overview,
        product_image,,product_image_thumb,product_image_path,product_createdon,product_type,product_price,product_old_price";
        $prefix = $this->db->dbprefix;

        // LEFT JOIN
        /*$param['joins'][] = array(
            'table' => 'category',
            'joint' => 'category.category_id = product.product_category_id',
            'type' => 'right'
        );*/
        // For search
        /*if(!empty($_GET['search'])  && $_GET['search'] != ''){
            $param['where_like'][] = array(
                'column'=>'product_name',
                'value'=>$keyword,
                'type'=>'both',
            );
        }
        // For search
        if(!empty($category_id>0)){
            $param['where']['category_id'] = $category_id;
        }

        // For Category
        if(!empty($_GET['product_category_id'])  && $_GET['product_category_id'] != ''){
            $param['where']['product_category_id'] = $_GET['product_category_id'];
        }
        // For Brand
        if(!empty($_GET['product_brand_id'])  && $_GET['product_brand_id'] != ''){
            $param['where']['product_brand_id'] = $_GET['product_brand_id'];
        }
        // For Style
        if(!empty($_GET['product_style_id'])  && $_GET['product_style_id'] != ''){
            $param['where']['product_style_id'] = $_GET['product_style_id'];
        }


        $param['where']['product_is_merchandise'] = STATUS_ACTIVE;*/

        // By type
        if (!empty($_GET['type']) && $_GET['type'] == '1') {
            $param['where']['product_is_summer'] = STATUS_ACTIVE;
        } elseif (!empty($_GET['type']) && $_GET['type'] == '2') {
            $param['where']['product_is_winter'] = STATUS_ACTIVE;
        }
        // SORT
        if (!empty($_GET['sort']) && $_GET['sort'] != '') {
            $param['order'] = 'product_name ' . $_GET['sort'];
        } else {
            $param['order'] = 'product_id DESC';
        }
        $param['limit'] = $limit;
        $param['offset'] = $offset;

        // debug($param,1);

        // Query data
        $data = $this->find_all_active($param);
        // debug($data,1);

        return $data;
    }

    public function get_product_by_id($id = 0, $params = array())
    {
        // Return product by ID
        $id = intval($id);
        if (!$id)
            return false;

        $params['joins'][] = array(
            "table" => "product_image",
            "joint" => "product_id = pi_product_id AND pi_is_featured = 1",
            "type" => "left",
        );
        $params['where']['product_id'] = $id;
        return $this->find_one($params);

    }

    public function get_product_by_cat_id($id = 0, $params = array())
    {

        /*$params['joins'][] = array(
                                    "table"=>"product_image" ,
                                    "joint"=>"product_id = pi_product_id AND pi_is_featured = 1" ,
                                    "type"=>"left" ,
                                );*/
        $params['joins'][] = array(
            "table" => "category",
            "joint" => "category.category_id = product.product_category_id AND category_status = 1",
            "type" => "left",
        );
        $params['fields'] = "product_id,product_category_id,product_name,product_slug,product_price,product_detail,product_image,
        product_image_thumb,product_image_path,product_status,category_name";
        $params['where']['product_category_id'] = $id;
        return $this->find_all_active($params);

    }

    // Check slug exists or not
    public function find_by_slug($slug)
    {
        $prefix = $this->db->dbprefix;

        // Set params

        /*$param['fields'] = "product_id,product_name,product_slug,product_description,product_image,product_image_thumb,product_image_path,product_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = product_id and comment_status=1) AS total_comments,product_category_name";*/

        /*$param['fields'] = "product_id,product_name,product_slug,product_description,product_image,product_image_thumb,product_image_path,product_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = product_id and comment_status=1) AS total_comments";*/


        // LEFT JOIN

        /*$param['joins'][] = array(

            "table"=>"product_category" ,

            "joint"=>"product_category.product_category_id = product.product_category_id and product_category.product_category_status =1",

            "type"=>"left"

        );*/


        $param['where']['product_slug'] = $slug;

        // Query

        $result = $this->find_one_active($param);


        // Return result;

        return $result;

    }

    //  For Seller
    public function get_data_by_user_id($userid)
    {
        $param = array();
        $param['where']['product_user_id'] = $userid;
        $param['where']['product_status !='] = STATUS_DELETE;
        $param['joins'][] = array(
            "table" => "category",
            "joint" => "category.category_id = product.product_category_id",
            // add left to get import records
            //"type"=>"left"
        );
        $result = $this->find_all($param);

        return $result;
    }

    public function get_fields($specific_field = "")
    {
        // Use when add new image
        $is_required_image = (($this->uri->segment(4) != null) && intval($this->uri->segment(4))) ? '' : 'required';


        $fields['product_id'] = array(
            'table' => $this->_table,
            'name' => 'product_id',
            'label' => 'ID',
            'type' => 'hidden',
            'type_dt' => 'text',
            'attributes' => array(),
            'dt_attributes' => array("width" => "5%"),
            'js_rules' => '',
            'rules' => 'trim'
        );


        $fields['product_category_id'] = array(
            'table' => $this->_table,
            'name' => 'product_category_id',
            'label' => 'Category',
            'type' => 'dropdown',
            'type_dt' => 'dropdown',
            'type_filter_dt' => 'dropdown',
            'js_rules' => 'required',
            //'dt_attributes'   => array("width"=>"30%"),
            'list_data' => array(),
            'rules' => 'required|trim'
        );
        $fields['product_brand_id'] = array(
            'table' => $this->_table,
            'name' => 'product_brand_id',
            'label' => 'Brand',
            'type' => 'dropdown',
            'type_dt' => 'dropdown',
            'type_filter_dt' => 'dropdown',
            'js_rules' => 'required',
            'list_data' => array(),
            'rules' => 'required|trim'
        );

        /* 'product_style_id' => array(
                'table'   => $this->_table,
                'name'   => 'product_style_id',
                'label'   => 'Style',
                'type'   => 'dropdown',
                'type_dt'   => 'dropdown',
                'type_filter_dt'   => 'dropdown',
                'js_rules'   => 'required',
                'list_data'=>array(),
                'rules'   => 'required|trim'
           ),*/


        /*'product_subcategory_id' => array(
               'table'   => $this->_table,
               'name'   => 'product_subcategory_id',
               'label'   => 'Sub Category',
               'type'   => 'dropdown',
               'type_dt'   => 'dropdown',
               'type_filter_dt'   => 'dropdown',
               'js_rules'   => '',
               'rules'   => 'trim'
          ),


        'product_childcategory_id' => array(
               'table'   => $this->_table,
               'name'   => 'product_childcategory_id',
               'label'   => 'Child Category',
               'type'   => 'dropdown',
               'type_dt'   => 'dropdown',
               'type_filter_dt'   => 'dropdown',
               'js_rules'   => '',
               'rules'   => 'trim'
          ),


        'product_subchildcategory_id' => array(
               'table'   => $this->_table,
               'name'   => 'product_subchildcategory_id',
               'label'   => 'Sub Child Category',
               'type'   => 'dropdown',
               'type_dt'   => 'dropdown',
               'type_filter_dt'   => 'dropdown',
               'js_rules'   => '',
               'rules'   => 'trim'
          ),*/


        $fields['product_name'] = array(
            'table' => $this->_table,
            'name' => 'product_name',
            'label' => 'Name',
            'type' => 'text',
            'attributes' => array("additional" => 'slugify="#' . $this->_table . '-' . $this->_field_prefix . 'slug"'),
            'js_rules' => 'required',
            'rules' => 'required|trim|htmlentities'
        );


        $fields['product_slug'] = array(
            'table' => $this->_table,
            'name' => 'product_slug',
            'label' => 'Slug',
            'type' => 'text',
            'attributes' => array(),
            'js_rules' => array("is_slug" => array()),
            'rules' => 'required|htmlentities|strtolower|is_unique[' . $this->_table . '.' . $this->_field_prefix . 'slug]|callback_is_slug'
        );

        /* 'product_price' => array(
             'table'   => 'product_price',
             'name'   => 'pp_price_id',
             'label'   => 'Product Price',
             'type'   => 'multiselect',
             'attributes'   => array(),
             'js_rules'   => '',
             'rules'   => ''
         ),*/

        //       ),
        $fields['product_type'] = array(
            'table' => $this->_table,
            'name' => 'product_type',
            'label' => 'Product Type',
            'type' => 'dropdown',
            'type_dt' => 'dropdown',
            'type_filter_dt' => 'dropdown',
            'js_rules' => 'required',
            'list_data' => array("1" => "Regular", "2" => "Sale"),
            'rules' => 'required|trim'
        );

        $fields['product_price'] = array(
            'table' => $this->_table,
            'name' => 'product_price',
            'label' => 'Price',
            'type' => 'text',
            'attributes' => array(),
            'lst_data' => array(),
            'js_rules' => 'required',
            'rules' => 'trim|required|htmlentities|regex_match[/^[\0-9\.]+$/]'
        );
        $fields['product_old_price'] = array(
            'table' => $this->_table,
            'name' => 'product_old_price',
            'label' => 'Old Price',
            'type' => 'text',
            'attributes' => array(),
            'lst_data' => array(),
            'js_rules' => '',
            'rules' => 'trim|htmlentities|regex_match[/^[\0-9\.]+$/]'
        );


        /*'product_stock' => array(
               'table'   => $this->_table,
               'name'   => 'product_stock',
               'label'   => 'Stock',
               'type'   => 'text',
               'attributes'   => array(),
               'js_rules'   => 'required',
               'rules'   => 'trim|htmlentities|integer|required'
            ),
      'product_sku' => array(
               'table'   => $this->_table,
               'name'   => 'product_sku',
               'label'   => 'SKU',
               'type'   => 'text',
               'attributes'   => array(),
               'js_rules'   => 'required',
               'rules'   => 'trim|htmlentities|required'
            ),*/

        /* 'product_color' => array(
             //'table' => (isset($_POST['signup']['signup_category'])) ? $this->_table : 'product_color_id',
             //'table' => $this->_table,
             'table' => 'product_color',
             'name' => 'mba_color_id',
             'label' => 'Color',
             'type' => 'multiselect',
             'attributes' => array(),
//                'js_rules' => 'required',
//                'rules' => 'required',
             'js_rules' => ($this->router->directory=='admin/') ? '' : 'required',
             'rules' => ($this->router->directory=='admin/') ? '' : 'required',
             'list_data'=>$this->model_color->find_all_list_active(array(),"color_name")

         ),*/

        /*'product_kit' => array(
            'table'   => "product_kit",
            'name'   => 'pk_kit_id',
            'label'   => 'Kit',
            'type'   => 'multiselect',
            'attributes'   => array(),
            'js_rules'   => '',
            'rules'   => '',
        ),


        'product_prep_size' => array(
            'table'   => "product_prep_size",
            'name'   => 'pp_prep_id',
            'label'   => 'Prep size',
            'type'   => 'multiselect',
            'attributes'   => array(),
            'js_rules'   => '',
            'rules'   => '',
        ),*/


        /* 'product_overview' => array(
             'table'   => $this->_table,
             'name'   => 'product_overview',
             'label'   => 'Short Description (100)',
             'type'   => 'textarea',
             'attributes'   => array(),
             'js_rules'   => '',
             'rules'   => 'trim|htmlentities|max_length[100]'
         ),*/

        /*'product_overview' => array(
            'table'   => $this->_table,
            'name'   => 'product_overview',
            'label'   => 'Short Description',
            'type'   => 'editor',
            'attributes'   => array(),
            'js_rules'   => 'required',
            'rules'   => 'required|trim|htmlentities'
        ),*/

        $fields['product_detail'] = array(
            'table' => $this->_table,
            'name' => 'product_detail',
            'label' => 'Long Description',
            'type' => 'editor',
            'attributes' => array(),
            'js_rules' => 'required',
            'rules' => 'required|trim|htmlentities'
        );


        /* 'product_info' => array(
                'table'   => $this->_table,
                'name'   => 'product_info',
                'label'   => 'Additional Info',
                'type'   => 'editor',
                'attributes'   => array(),
                'js_rules'   => '',
                'rules'   => 'trim|htmlentities'
             ),*/

        /*'product_tech_info' => array(
               'table'   => $this->_table,
               'name'   => 'product_tech_info',
               'label'   => 'Tech information',
               'type'   => 'editor',
               'attributes'   => array(),
               'js_rules'   => '',
               'rules'   => 'trim|htmlentities'
            ),
        'product_kit_component' => array(
               'table'   => $this->_table,
               'name'   => 'product_kit_component',
               'label'   => 'Kit info',
               'type'   => 'editor',
               'attributes'   => array(),
               'js_rules'   => '',
               'rules'   => 'trim|htmlentities'
            ),*/


        $fields['product_delivery'] = array(
            'table' => $this->_table,
            'name' => 'product_delivery',
            'label' => 'Delivery Info',
            'type' => 'editor',
            'attributes' => array(),
            'js_rules' => '',
            'rules' => 'trim|htmlentities'
        );


        /*'product_returns' => array(
               'table'   => $this->_table,
               'name'   => 'product_returns',
               'label'   => 'Returns & Refunds',
               'type'   => 'editor',
               'attributes'   => array(),
               'js_rules'   => '',
               'rules'   => 'trim|htmlentities'
            ),*/

        $fields['product_rated'] = array(
            'table' => $this->_table,
            'name' => 'product_rated',
            'label' => 'Rating',
            'type' => 'dropdown',
            'type_dt' => 'dropdown',
            'type_filter_dt' => 'dropdown',
            'js_rules' => 'required',
            'list_data' => array(
                "1" => "1",
                "2" => "2",
                "3" => "3",
                "4" => "4",
                "5" => "5",
            ),
            'rules' => 'required|trim'
        );

        $fields['product_image'] = array(
            'table' => $this->_table,
            'name' => 'product_image',
            'label' => 'Image',
            'name_path' => 'product_image_path',
            'upload_config' => 'site_upload_product',
            'type' => 'fileupload',
            'thumb' => array(array('name' => 'product_image_thumb', 'max_width' => 230, 'max_height' => 245),),
            'attributes' => array(
                'allow_ext' => 'png|jpeg|jpg',
                'Image Size' => '800 x 600'
            ),
            'type_dt' => 'image',
            'randomize' => true,
            'preview' => 'true',
            'dt_attributes' => array("width" => "10%"),
            'rules' => 'trim|htmlentities',
            'js_rules' => $is_required_image,
        );

        /* 'product_is_promotion' => array(
             'table'   => $this->_table,
             'name'   => 'product_is_promotion',
             'label'   => 'Promotion',
             'type'   => 'switch',
             'type_dt'   => 'dropdown',
             'type_filter_dt' => 'dropdown',
             'list_data_key' => "product_status" ,
             'list_data' => array(
                 0 => "<span class='label label-danger'>Inactive</span>" ,
                 1 =>  "<span class='label label-primary'>Active</span>"
             ) ,
             'default'   => '0',
             'attributes'   => array(),
             'dt_attributes'   => array("width"=>"7%"),
             'rules'   => 'trim'
         ),*/

        /*          'product_featured' => array(
                             'table'   => $this->_table,
                             'name'   => 'product_featured',
                             'label'   => 'Is Featured?',
                             'type'   => 'switch',
                             'type_dt'   => 'dropdown',
                             'type_filter_dt' => 'dropdown',
                             'list_data_key' => "product_status" ,
                             'list_data' => array(),
                             'default'   => '1',
                             'attributes'   => array(),
                             'dt_attributes'   => array("width"=>"7%"),
                             'rules'   => 'trim'
                          ),*/


        /*'product_is_featured' => array(
            'table'   => $this->_table,
            'name'   => 'product_is_featured',
            'label'   => 'Home Page',
            'type'   => 'switch',
            'type_dt'   => 'dropdown',
            'type_filter_dt' => 'dropdown',
            'list_data_key' => "product_status" ,
            'list_data' => array(
                0 => "<span class='label label-danger'>Inactive</span>" ,
                1 =>  "<span class='label label-primary'>Active</span>"
            ) ,
            'default'   => '1',
            'attributes'   => array(),
            'dt_attributes'   => array("width"=>"7%"),
            'rules'   => 'trim'
        ),
        'product_is_merchandise' => array(
            'table'   => $this->_table,
            'name'   => 'product_is_merchandise',
            'label'   => 'Is Merchandise Product?',
            'type'   => 'switch',
            'type_dt'   => 'dropdown',
            'type_filter_dt' => 'dropdown',
            'list_data_key' => "product_status" ,
            'list_data' => array(
                0 => "<span class='label label-danger'>Inactive</span>" ,
                1 =>  "<span class='label label-primary'>Active</span>"
            ) ,
            'default'   => '1',
            'attributes'   => array(),
            'dt_attributes'   => array("width"=>"7%"),
            'rules'   => 'trim'
        ),
        'product_is_accessories' => array(
            'table'   => $this->_table,
            'name'   => 'product_is_accessories',
            'label'   => 'Is Accessories Product?',
            'type'   => 'switch',
            'type_dt'   => 'dropdown',
            'type_filter_dt' => 'dropdown',
            'list_data_key' => "product_status" ,
            'list_data' => array(
                0 => "<span class='label label-danger'>Inactive</span>" ,
                1 =>  "<span class='label label-primary'>Active</span>"
            ) ,
            'default'   => '1',
            'attributes'   => array(),
            'dt_attributes'   => array("width"=>"7%"),
            'rules'   => 'trim'
        ),
        'product_is_summer' => array(
            'table'   => $this->_table,
            'name'   => 'product_is_summer',
            'label'   => 'Is Summer Collection?',
            'type'   => 'switch',
            'type_dt'   => 'dropdown',
            'type_filter_dt' => 'dropdown',
            'list_data_key' => "product_status" ,
            'list_data' => array(
                0 => "<span class='label label-danger'>Inactive</span>" ,
                1 =>  "<span class='label label-primary'>Active</span>"
            ) ,
            'default'   => '1',
            'attributes'   => array(),
            'dt_attributes'   => array("width"=>"7%"),
            'rules'   => 'trim'
        ),
        'product_is_winter' => array(
            'table'   => $this->_table,
            'name'   => 'product_is_winter',
            'label'   => 'Is Winter Collection?',
            'type'   => 'switch',
            'type_dt'   => 'dropdown',
            'type_filter_dt' => 'dropdown',
            'list_data_key' => "product_status" ,
            'list_data' => array(
                0 => "<span class='label label-danger'>Inactive</span>" ,
                1 =>  "<span class='label label-primary'>Active</span>"
            ) ,
            'default'   => '1',
            'attributes'   => array(),
            'dt_attributes'   => array("width"=>"7%"),
            'rules'   => 'trim'
        ),*/

        // Set Best deal only for admin (except seller)
        if ($this->router->directory == "admin/") {
            $fields['product_is_best_deal'] = array(
                'table' => $this->_table,
                'name' => 'product_is_best_deal',
                'label' => 'Best Deal',
                'type' => 'switch',
                'type_dt' => 'dropdown',
                'type_filter_dt' => 'dropdown',
                'list_data_key' => "product_is_best_deal",
                'list_data' => array(
                    0 => "<span class='label label-danger'>Inactive</span>",
                    1 => "<span class='label label-primary'>Active</span>"
                ),
                'default' => '0',
                'attributes' => array(),
                'dt_attributes' => array("width" => "7%"),
                'rules' => 'trim'
            );

            //array_push($fields, $extra_field);
        }
        // Set Product Week only for admin (except seller)
        if ($this->router->directory == "admin/") {
            $fields['product_is_week'] = array(
                'table' => $this->_table,
                'name' => 'product_is_week',
                'label' => 'Product Week',
                'type' => 'switch',
                'type_dt' => 'dropdown',
                'type_filter_dt' => 'dropdown',
                'list_data_key' => "product_is_week",
                'list_data' => array(
                    0 => "<span class='label label-danger'>Inactive</span>",
                    1 => "<span class='label label-primary'>Active</span>"
                ),
                'default' => '0',
                'attributes' => array(),
                'dt_attributes' => array("width" => "7%"),
                'rules' => 'trim'
            );

            //array_push($fields, $extra_field);
        }
        // Set Product Week only for admin (except seller)
        if ($this->router->directory == "admin/") {
            $fields['product_hot_sale'] = array(
                'table' => $this->_table,
                'name' => 'product_hot_sale',
                'label' => 'Hot Sale!',
                'type' => 'switch',
                'type_dt' => 'dropdown',
                'type_filter_dt' => 'dropdown',
                'list_data_key' => "product_hot_sale",
                'list_data' => array(
                    0 => "<span class='label label-danger'>Inactive</span>",
                    1 => "<span class='label label-primary'>Active</span>"
                ),
                'default' => '0',
                'attributes' => array(),
                'dt_attributes' => array("width" => "7%"),
                'rules' => 'trim'
            );

            //array_push($fields, $extra_field);
        }
        // Set Product Week only for admin (except seller)
        if ($this->router->directory == "admin/") {
            $fields['product_is_search'] = array(
                'table' => $this->_table,
                'name' => 'product_is_search',
                'label' => 'Popular Search',
                'type' => 'switch',
                'type_dt' => 'dropdown',
                'type_filter_dt' => 'dropdown',
                'list_data_key' => "product_hot_sale",
                'list_data' => array(
                    0 => "<span class='label label-danger'>Inactive</span>",
                    1 => "<span class='label label-primary'>Active</span>"
                ),
                'default' => '0',
                'attributes' => array(),
                'dt_attributes' => array("width" => "7%"),
                'rules' => 'trim'
            );

            //array_push($fields, $extra_field);
        }


        $fields['product_status'] = array(
            'table' => $this->_table,
            'name' => 'product_status',
            'label' => 'Status?',
            'type' => 'switch',
            'type_dt' => 'dropdown',
            'type_filter_dt' => 'dropdown',
            'list_data_key' => "product_status",
            'list_data' => array(
                0 => "<span class='label label-danger'>Inactive</span>",
                1 => "<span class='label label-primary'>Active</span>"
            ),
            'default' => '1',
            'attributes' => array(),
            'dt_attributes' => array("width" => "7%"),
            'rules' => 'trim'
        );

        $fields['product_user_id'] = array(
            'table' => $this->_table,
            'name' => 'product_user_id',
            'label' => 'User ID',
            'type' => 'hidden',
            'type_dt' => 'text',
            //'default'=>$this->session->userdata('userdata')['signup_id'],
            //'type_filter_dt'   => 'dropdown',
            'js_rules' => '',
            'list_data' => array(),
            'rules' => 'trim'

        );

        //debug($this->uri->segment(1),1);

        /*if ($this->uri->segment(1) == "seller_dashboard") {
            $fields['product_user_id'] = array(
                'table'   => $this->_table,
                'name'   => 'product_user_id',
                'label'   => 'User ID',
                'type'   => 'text',
                'type_dt'   => 'text',
                'default'=>$this->session->userdata('userdata')['signup_id'],
                //'type_filter_dt'   => 'dropdown',
                'js_rules'   => 'required',
                'list_data'=>array(),
                'rules'   => 'required|trim'

            );

            //array_push($fields, $extra_field);


        }*/

        if ($specific_field)
            return $fields[$specific_field];
        else
            return $fields;
    }

}

?>