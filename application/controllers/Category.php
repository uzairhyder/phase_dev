<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends MY_Controller {

	/**
	 * news Controller. - The default controller
	 *
	 * @package		news - Controller
	 * @author		Mike Jason
	 * @version		1.0
	 * @since
	 */

    private $json_param = array();
	 
	public function __construct()
    {
    	// Call the Model constructor latest_product
        parent::__construct();
    }

    // Default index page
	public function index($id='')
	{
        // Set banner heading
        //$data['banner_heading'] = "news";
        // Get banner
        //$data['banner'] = $this->model_banner->get_banners(8);
        //$data['banner'] = $this->model_inner_banner->find_by_pk(4);
        //debug($data['banner'],1);
        // Get categories
        //$data['categories'] = $this->get_categories();
        // Get recent post
        //$data['recent'] = $this->model_news->get_recent_post();
        // Set data
        //$data['newss'] = $this->model_news->find_all_active();
		//$data['news_info'] = $this->_pagination();
        //debug($data['newss'],1);
        $data['page_content'] = $this->model_cms_page->find_by_pk(17);
        // Load view
		$this->load_view("index",$data);
	}

    public function listing($slug = '')
    {
        // debug($slug,1);
        // has slug
        if(!empty($slug))
        {
            // Get slug response
            $category_detail = $this->model_category->find_by_slug($slug);

            // Found slug in table
            if(array_filled($category_detail))
            {
                //$data['banner'] = $this->model_banner->get_banners(8);

                // $data['inner_banner'] = $this->model_inner_banner->find_by_pk(9);
                // Set news info
                $data['detail'] = $category_detail;
                //$data['parent_c '] = $this->model_category_parent->find_all_active();
                // debug($data['detail']);
                // Set news comments
                //$data['comments'] = $this->model_news->get_comments($slug);
                // Set banner heading
                //$data['banner_heading'] = "news Detail";

                // Get Categories
                $data['brand'] = $this->model_brand->get_brands_with_count();
                // Get Brand
                $data['category'] = $this->model_category->get_categories_with_count();
                $data['prices'] = $this->model_product->get_count_by_price();
                // Set data
                $product_info = $this->_pagination($category_detail['category_id'],$slug);
                $data['product_info'] = $product_info['data'];
                $data['link'] = $product_info['links'];
                //debug($data['product_info'],1);
                // Load view
                $this->load_view("listing" , $data);
            }
            // Not found
            else
            {
                redirect(l('404') , true);
            }
        }
        // No slug
        else
        {
            redirect(l('404') , true);
        }
    }

    // product post pagination
    private function _pagination($cat_id, $slug, $search='')
    {
        $this->load->library('mypagination');

        $pagination["base_url"] = g('base_url') . $this->router->fetch_class()."/listing/". $slug . "/page/";
        //$pagination["total_rows"] = $this->model_product->get_total_count();
        $pagination["total_rows"] = $this->model_product->get_total_count(array(),'',$cat_id);
        $pagination["per_page"] = 12;
        $pagination['use_page_numbers']  = TRUE;
        $pagination["uri_segment"] = 5;
        $pagination['last_tag_open'] = '';

        // For GET Filters
        $pagination['suffix'] = '?' . http_build_query($_GET, '', "&");
        $pagination["first_url"] = "1" . $pagination['suffix'];

        $this->mypagination->initialize($pagination);

        $page = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
        $vars["data"] = $this->model_product->get_pagination_data($pagination["per_page"], (($page > 0)?($page-1):($page)) * $pagination["per_page"],array(),$search,$cat_id);
        $vars["links"] = $this->mypagination->create_links();

        return $vars;
    }

    public function brand($slug = '')
    {
        // debug($slug,1);
        // has slug
        if(!empty($slug))
        {
            // Get slug response
            $detail = $this->model_brand->find_by_slug($slug);

            // Found slug in table
            if(array_filled($detail))
            {
                //$data['banner'] = $this->model_banner->get_banners(8);

                // $data['inner_banner'] = $this->model_inner_banner->find_by_pk(9);
                // Set news info
                $data['detail'] = $detail;
                //$data['parent_c '] = $this->model_category_parent->find_all_active();
                // debug($data['detail']);
                // Set news comments
                //$data['comments'] = $this->model_news->get_comments($slug);
                // Set banner heading
                //$data['banner_heading'] = "news Detail";

                // Get Categories
                $data['brand'] = $this->model_brand->get_brands_with_count();
                // Get Brand
                $data['category'] = $this->model_category->get_categories_with_count();
                $data['prices'] = $this->model_product->get_count_by_price();
                // Set data
                $product_info = $this->_brand_pagination($detail['brand_id'],$slug);
                $data['product_info'] = $product_info['data'];
                $data['link'] = $product_info['links'];
                //debug($data['product_info'],1);
                // Load view
                $this->load_view("brand" , $data);
            }
            // Not found
            else
            {
                redirect(l('404') , true);
            }
        }
        // No slug
        else
        {
            redirect(l('404') , true);
        }
    }

    // product post pagination
    private function _brand_pagination($brand_id, $slug)
    {
        $this->load->library('mypagination');

        $pagination["base_url"] = g('base_url') . $this->router->fetch_class()."/brand/". $slug . "/page/";
        //$pagination["total_rows"] = $this->model_product->get_total_count();
        $pagination["total_rows"] = $this->model_product->get_total_count(array(),'','',$brand_id);
        $pagination["per_page"] = 12;
        $pagination['use_page_numbers']  = TRUE;
        $pagination["uri_segment"] = 5;
        $pagination['last_tag_open'] = '';

        // For GET Filters
        $pagination['suffix'] = '?' . http_build_query($_GET, '', "&");
        $pagination["first_url"] = "1" . $pagination['suffix'];

        $this->mypagination->initialize($pagination);

        $page = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
        $vars["data"] = $this->model_product->get_pagination_data($pagination["per_page"], (($page > 0)?($page-1):($page)) * $pagination["per_page"],array(),'','',$brand_id);
        $vars["links"] = $this->mypagination->create_links();

        return $vars;
    }

    public function price($price='')
    {
        // debug($slug,1);
        // has slug
        //$price = $this->input->get('price');
        if(!empty($price))
        {
            //$data['banner'] = $this->model_banner->get_banners(8);

            // $data['inner_banner'] = $this->model_inner_banner->find_by_pk(9);
            // Set news info
            //$data['detail'] = $detail;
            //$data['parent_c '] = $this->model_category_parent->find_all_active();
            // debug($data['detail']);
            // Set news comments
            //$data['comments'] = $this->model_news->get_comments($slug);
            // Set banner heading
            //$data['banner_heading'] = "news Detail";

            // Get Categories
            $data['brand'] = $this->model_brand->get_brands_with_count();
            // Get Brand
            $data['category'] = $this->model_category->get_categories_with_count();
            $data['prices'] = $this->model_product->get_count_by_price();
            // Set data
            $product_info = $this->_price_pagination($price);
            $data['product_info'] = $product_info['data'];
            $data['link'] = $product_info['links'];
            //debug($data['product_info'],1);
            // Load view
            $this->load_view("price" , $data);
        }
        // No slug
        else
        {
            redirect(l('404') , true);
        }
    }

    // product post pagination
    private function _price_pagination($price)
    {
        $this->load->library('mypagination');

        $pagination["base_url"] = g('base_url') . $this->router->fetch_class()."/price/" . $price . "/page/";
        //$pagination["total_rows"] = $this->model_product->get_total_count();
        $pagination["total_rows"] = $this->model_product->get_total_count(array(),'','','',$price);
        $pagination["per_page"] = 12;
        $pagination['use_page_numbers']  = TRUE;
        $pagination["uri_segment"] = 5;
        $pagination['last_tag_open'] = '';

        // For GET Filters
        $pagination['suffix'] = '?' . http_build_query($_GET, '', "&");
        $pagination["first_url"] = "1" . $pagination['suffix'];

        $this->mypagination->initialize($pagination);

        $page = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
        $vars["data"] = $this->model_product->get_pagination_data($pagination["per_page"], (($page > 0)?($page-1):($page)) * $pagination["per_page"],array(),'','','',$price);
        $vars["links"] = $this->mypagination->create_links();

        return $vars;
    }


    public function search()
    {
        $search = $this->input->get('search');
        // debug($slug,1);
        // has slug
        if(!empty($search))
        {
            //$data['banner'] = $this->model_banner->get_banners(8);

            // $data['inner_banner'] = $this->model_inner_banner->find_by_pk(9);
            // Set news info
           // $data['detail'] = $category_detail;
            //$data['parent_c '] = $this->model_category_parent->find_all_active();
            // debug($data['detail']);
            // Set news comments
            //$data['comments'] = $this->model_news->get_comments($slug);
            // Set banner heading
            //$data['banner_heading'] = "news Detail";

            // Get Categories
            $data['brand'] = $this->model_brand->get_brands_with_count();
            // Get Brand
            $data['category'] = $this->model_category->get_categories_with_count();
            $data['prices'] = $this->model_product->get_count_by_price();
            // Set data
            $product_info = $this->_pagination_search($search);
            $data['product_info'] = $product_info['data'];
            $data['link'] = $product_info['links'];
            //debug($data['product_info'],1);
            // Load view
            $this->load_view("search" , $data);
        }
        // No slug
        else
        {
            redirect(l('404') , true);
        }
    }

    // product post pagination
    private function _pagination_search($search='')
    {
        $this->load->library('mypagination');

        $pagination["base_url"] = g('base_url') . $this->router->fetch_class()."/search/page/";
        //$pagination["total_rows"] = $this->model_product->get_total_count();
        $pagination["total_rows"] = $this->model_product->get_total_count(array(),$search);
        $pagination["per_page"] = 12;
        $pagination['use_page_numbers']  = TRUE;
        $pagination["uri_segment"] = 4;
        $pagination['last_tag_open'] = '';

        // For GET Filters
        $pagination['suffix'] = '?' . http_build_query($_GET, '', "&");
        $pagination["first_url"] = "1" . $pagination['suffix'];

        $this->mypagination->initialize($pagination);

        $page = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $vars["data"] = $this->model_product->get_pagination_data($pagination["per_page"], (($page > 0)?($page-1):($page)) * $pagination["per_page"],array(),$search);
        $vars["links"] = $this->mypagination->create_links();

        return $vars;
    }



    public function detail($slug = '')
    {
    	// debug($slug,1);
        // has slug
        if(!empty($slug))
        {
            // Get slug response
            $category_detail = $this->model_category->find_by_slug($slug);

            // Found slug in table
            if(array_filled($category_detail))
            {
                //$data['banner'] = $this->model_banner->get_banners(8);

                // $data['inner_banner'] = $this->model_inner_banner->find_by_pk(9);
                // Set news info
                $data['detail'] = $category_detail;
                $data['parent_c '] = $this->model_category_parent->find_all_active();
               // debug($data['detail']);
                // Set news comments
                //$data['comments'] = $this->model_news->get_comments($slug);
                // Set banner heading
                //$data['banner_heading'] = "news Detail";
                    // Load view
                $this->load_view("detail" , $data);
            }
            // Not found
            else
            {
                redirect(l('404') , true);
            }
        }
        // No slug
        else
        {
            redirect(l('404') , true);
        }
    }

    // Info for Sub category
    public function info($slug='')
    {
        if(!empty($slug))
        {
            // Get slug response
            $category_detail = $this->model_category->find_by_slug_all($slug);

            // Found slug in table
            if(array_filled($category_detail))
            {
                //$data['banner'] = $this->model_banner->get_banners(8);

                // $data['inner_banner'] = $this->model_inner_banner->find_by_pk(9);
                // Set news info
                $data['detail'] = $category_detail;
                // debug($data['detail']);
                // Set news comments
                //$data['comments'] = $this->model_news->get_comments($slug);
                // Set banner heading
                //$data['banner_heading'] = "news Detail";
                // Load view
                $this->load_view("info" , $data);
            }
            // Not found
            else
            {
                redirect(l('404') , true);
            }
        }
        // No slug
        else
        {
            redirect(l('404') , true);
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */