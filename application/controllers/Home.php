<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller
{

    /**
     * Default Controller
     */

    public function __construct()
    {
        $this->seo_id = 1;
        // Call the Model constructor latest_product
        parent::__construct();
    }

    // Default Home Page
    public function index()
    {
        global $config;
        // Get banner

        // $this->layout_data['title'] = 'Phase3kicking | Kicking academy | football coaches';
        // $this->layout_data['meta_data']['keywords'] = '';
        // $this->layout_data['meta_data']['description'] = 'Searching for “football camps near me” in Midwest? Phase 3 kicking is America’s top football kicking camp. Learn from the best college coaches in the game.';

        $param['where']['banner_id'] = 1;
        $data['banner'] = $this->model_banner->find_one($param);


        // $param1['where']['camp_featured'] = 1;

        // $param1['order'] = 'camp_date';        
        // $data['upcoming_camp'] = $this->model_camp->find_all_active($param1);
        // debug($data['upcoming_camp'],1);

        $parayear['order'] = 'camp_year_id DESC';
        $parayear['where']['camp_year_status !='] = 2;
        $data['camp_year'] = $this->model_camp_year->find_one($parayear);
            // debug($data['camp_year']['camp_year_id'],1);
//         $param1['where']['camp_year_result'] == $data['camp_year']['camp_year_id'];
//         $param1['where']['camp_featured'] = 1;
//         $param1['order'] = 'camp_date';   
// 		$param1['limit'] = 10;
//         $data['upcoming_camp'] = $this->model_camp->find_all_active($param1);
        
//         	$param1['where']['camp_year_result'] = $data['camp_year']['camp_year_id'];
// 			$param1['order'] = 'camp_date DESC';
// 			$param1['limit'] = 10;
// 			$data['upcoming_camp'] = $this->model_camp->find_all_active($param1);


        $upcoming_camp = "SELECT * FROM mk_camp WHERE camp_status = '1' ORDER BY STR_TO_DATE(camp_date, '%m/%d/%Y') DESC, STR_TO_DATE(camp_date, '%Y-%m-%d') DESC    Limit 10";
        $que12 = $this->db->query($upcoming_camp);
        $data['upcoming_camp'] = $que12->result_array();

        // $upcoming_camp = "SELECT * FROM mk_camp 
  
        // WHERE camp_status = '1' 
        // ORDER BY STR_TO_DATE(camp_date, '%m/%d/%Y') DESC, STR_TO_DATE(camp_date, '%m-%d-%Y') DESC
        // LIMIT 10";
        // $que12 = $this->db->query($upcoming_camp);
        // $data['upcoming_camp'] = $que12->result_array();
								
        //  $para['order'] = 'camp_year_id DESC';
        // $para['where']['camp_year_status !='] = 2;
        // $data['camp_year'] = $this->model_camp_year->find_one($para);
        //     debug( $data['camp_year'])
// Sort the items based on the date in descending order
usort($data['upcoming_camp'], function ($a, $b) {
    $dateA = strtotime($a['camp_date']); // Convert slashes to dashes
    $dateB = strtotime($b['camp_date']);

    // Compare the dates in descending order
    if ($dateB != $dateA) {
        return $dateB - $dateA;
    }

    // If the dates are the same, compare using the full date string
    return strcmp($b['date'], $a['date']);
});

    
        $param2['where']['team_featured'] = 1;
        $param2['limit'] = 4;
        $data['featured_team'] = $this->model_team->find_all_active($param2);

        $data['testimonial'] = $this->model_testimonial->find_all_active();

        $data['sponsor'] = $this->model_sponsor->find_all_active();
        //debug($data['testimonial'],1);
        $data['home_image'] = $this->model_cms_page->get_page(1);
        $data['content1'] = $this->model_cms_page->get_page(6);
        $data['content2'] = $this->model_cms_page->get_page(7);
        $data['content3'] = $this->model_cms_page->get_page(8);
        $data['content4'] = $this->model_cms_page->get_page(9);
        $data['content5'] = $this->model_cms_page->get_page(10);
        $data['content6'] = $this->model_cms_page->get_page(17);

        // debug($data['content6'],1);


        $para['where']['headings_id'] = 1;
        $data['heading1'] = $this->model_headings->find_one($para);

        $para2['where']['headings_id'] = 2;
        $data['heading2'] = $this->model_headings->find_one($para2);

        $para3['where']['headings_id'] = 3;
        $data['heading3'] = $this->model_headings->find_one($para3);

        $para4['where']['headings_id'] = 4;
        $data['heading4'] = $this->model_headings->find_one($para4);


        $paramnavheading['order'] = 'nav_bar_number';
        $data['main_nav_headings'] = $this->model_nav_bar->find_all($paramnavheading);
        // debug( $data['main_nav_headings'],1);
        
        
        // Select the navigation items from the database and order them by position and created_at
        // $this->db->select('*');
        // $this->db->from('mk_nav_headings');
        // $this->db->order_by('nav_bar_number','ASC');
        // $query= $this->db->get();
        // $data['main_nav_headings'] = $query->result();
        // debug( $data['main_nav_headings'],1);

        // // Check if query was successful
        // if ($query) {
        //     // Pass the navigation items to the view
        //     $data['main_nav_headings'] = $query->result();
        // } else {
        //     // Handle error
        //     echo 'Error: Unable to fetch navigation items';
        // }

        // debug($data['main_nav_headings'],1);

        //debug($data['featured_team'],1);
        // Get Home page products
        //$data['feature_products'] = $this->model_product->get_feature_products();
        // debug($data['banner'],1);h

        // Best deals
        // $data['best_deals'] = $this->model_product->best_deals();
        // // Top 10 Selected Products On the Week
        // $data['product_week'] = $this->model_product->product_week();
        // // Top 10 Selected Products On the Week
        // $data['hot_sale'] = $this->model_product->hot_sale();
        // // Top 10 Selected Products On the Week
        // $data['recent_views'] = $this->model_product->recent_views($this->userid);
        // // Top 10 Selected Products On the Week
        // $data['popular_search'] = $this->model_product->popular_search();
        // // Flash Sale
        // $data['flash_sale'] = $this->model_product_flash_sale->flash_sale();
        //debug($data['flash_sale']);
        // Hot sale
        //$data['hot_sale'] = $this->model_product->hot_sale();
        // Recent views
        //$data['recent_views'] = $this->model_product->recent_views($this->userid);

        //debug($this->layout_data['title'],1);

        // Load View
        $this->load_view("index", $data);
    }

    public function detail($slug = '')
    {
        global $config;
        $this->layout_data['title'] = "News and Event Details | " . g('site_name');
        $data['banner'] = $this->model_inner_banner->get_banner(19);
        // has slug
        if (!empty($slug)) {
            // Get slug response
            $parm['where']['news_slug'] = $slug;
            $data['news_details'] = $news_details = $this->model_news->find_one_active($parm);
            // debug($data['news_details'],1);
            // Found slug in table
            if (array_filled($data['news_details'])) {
                // Load view
                $this->load_view("detail", $data);
            }
            // Not found
            else {
                redirect(l('404'), true);
            }
        }
        // No slug
        else {
            redirect(l('404'), true);
        }
    }
}
