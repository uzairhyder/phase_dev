<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends MY_Controller {

    /**
     * Blog Controller. - The default controller
     *
     * @package		Blog - Controller
     * @author		Mike Jason
     * @version		1.0
     * @since
     */

    private $json_param = array();

    public function __construct()
    {
        $this->seo_id = 10;
        // Call the Model constructor latest_product
        parent::__construct();
    }

    // Default index page
    // public function index($id='')
    public function index()
    {
        // Set banner heading
        $data['banner_heading'] = "Blog";
        // Get banner
        $param['where']['banner_id'] =7;
        $data['banner'] = $this->model_banner->find_one($param);

        $para13['where']['headings_id'] = 13;
        $data['heading13'] = $this->model_headings->find_one($para13);
        // Get categories
        //$data['categories'] = $this->get_categories();
        // Get recent post
        //$data['recent'] = $this->model_blog->get_recent_post();
        // Set data
        // $data['blog_info'] = $this->_pagination();
        if(isset($_GET['search']) && !empty($_GET['search'])  ){

            $searchby = htmlentities($_GET['search']);
            $param1['where_like'][] = array('column'=>'blog_title','value'=>$searchby,'type'=>'both');
            
        }
        $param1['order'] = 'blog_id DESC';
        $data['blogs'] = $this->model_blog->find_all_active($param1);
        // debug($data['blogs'],1);

        $paramnavheading['order'] = 'nav_bar_number';
        $data['main_nav_headings'] = $this->model_nav_bar->find_all($paramnavheading);
        
        // Load view
        $this->load_view("index" , $data);
    }

    // Search Blog
    public function search()
    {
        $keyword = $this->input->get('search');
        if(!empty($keyword)){
            $this->session->set_userdata('search_keyword',$keyword);
        }
        else{
            if($this->session->userdata('search_keyword')==null){
                redirect(g('base_url'));
            }
            else{
                $keyword = $this->session->userdata('search_keyword');
            }
        }

        // Set banner heading
        $data['banner_heading'] = "Blog - Search";
        // Set data
        $data['blog_info'] = $this->_search_pagination($keyword);
        // Load view
        $this->load_view("search" , $data);
    }

    // Blog post pagination
    private function _pagination()
    {
        $this->load->library('mypagination');

        $pagination["base_url"] = g('base_url') . $this->router->fetch_class()."/page/";
        $pagination["total_rows"] = $this->model_blog->get_total_count();
        $pagination["per_page"] = 10;
        $pagination['use_page_numbers']  = TRUE;
        $pagination["uri_segment"] = 3;
        $pagination['last_tag_open'] = '';

        $this->mypagination->initialize($pagination);

        $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
        $vars["data"] = $this->model_blog
            ->get_pagination_data($pagination["per_page"], (($page > 0)?($page-1):($page)) * $pagination["per_page"]);

        $vars["links"] = $this->mypagination->create_links();

        return $vars;
    }

    // Blog search pagination
    private function _search_pagination($keyword)
    {
        $this->load->library('mypagination');

        $pagination["base_url"] = g('base_url') .$this->router->fetch_class() . "/search/page/";
        $pagination["total_rows"] = $this->model_blog->get_total_count(array(), $keyword);
        $pagination["per_page"] = 10;
        $pagination['use_page_numbers']  = TRUE;
        $pagination["uri_segment"] = 4;
        $pagination['last_tag_open'] = '';

        $this->mypagination->initialize($pagination);

        $page = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $vars["data"] = $this->model_blog
            ->get_pagination_data($pagination["per_page"], (($page > 0)?($page-1):($page)) * $pagination["per_page"], array(), $keyword);

        $vars["links"] = $this->mypagination->create_links();

        return $vars;
    }

  public function detail($slug = '')
    {
        global $config;

        $this->layout_data['title'] = "Blog Details| ".g('site_name');
         // $data['banner'] = $this->model_inner_banner->get_banner(18);
        $param['where']['banner_id'] =7;
        $data['banner'] = $this->model_banner->find_one($param);
          
        $parm['where']['blog_slug'] = $slug;
        $data['blog_details']  = $this->model_blog->find_one_active($parm);
        // debug($data['blog_and_events_details'],1);
        $parm_1['where']['comment_post_id'] = $data['blog_details']['blog_id'];
        $data['leave_a_comment'] =  $this->model_comment->find_all_active($parm_1);
        // debug($data['leave_a_comment'],1);

        $parm1['where']['blog_status'] = 1;
        $data['blog'] = $this->model_blog->find_all_active($parm1);
// recent blog
        $param_2['limit'] = 5;
        $param_2['where']['blog_id !='] = $data['blog_details']['blog_id'];
        $param_2['order'] = 'blog_id DESC';
        $data['recent_blog'] = $this->model_blog->find_all_active($param_2);

// Popular blog
        $param_3['limit'] = 5;
        $param_3['where']['blog_latest_featured'] = 1;
        $param_3['order'] = 'blog_id DESC';
        $data['popular_blog'] = $this->model_blog->find_all_active($param_3);
        // debug($data['recent_blog'],1);

        $para14['where']['headings_id'] = 14;
        $data['heading14'] = $this->model_headings->find_one($para14);

       
        $this->load_view("detail", $data);
    }

    // Get categories (Get recent categories 5)
    public function get_categories()
    {
        // Get data
        $data = $this->model_blog_category->get_recent_categories();
        // Return
        return $data;
    }


    // public function comment_save()
    // {
    //     $comment = $this->input->post('comment');

    //     if(isset($_POST) && array_filled($comment))
    //     {
    //         $custom_rule = array(
    //             'g-recaptcha-response'=>array(
    //                 'field'=>'g-recaptcha-response',
    //                 'label'=>'Captcha',
    //                 'rules'=>'required'
    //             )
    //         );

    //         if($this->validate("model_comment", $custom_rule))
    //         {
    //             $this->model_comment->set_attributes($comment);
    //             $inserted_id = $this->model_comment->save();


    //             $this->json_param['status'] = 1;
    //             $this->json_param['txt'] = 'Your comment has been submitted successfully.Waiting for Admin approval.';

    //         }
    //         else
    //         {
    //             $this->json_param['status'] = 0;
    //             $this->json_param['txt'] = validation_errors();
    //         }

    //         echo json_encode($this->json_param);
    //     }
    // }
public function save_comment()
    {
        // debug($_POST,1);
        if(count($_POST) > 0) 
        {
            if($this->validate("model_comment"))
            {
                $form_name = 'comment';
                $comment_data = $_POST['comment'];
                $comment_data['comment_status'] = 0;
                $this->model_comment->set_attributes($comment_data);
                $inserted_id = $this->model_comment->save();

                if($inserted_id > 0)
                {
                    $param['status'] = 1;
                    $param['reload'] = 1;
                    $param['txt'] = 'Your comment has been submitted successfully.Waiting for Admin approval.';
                    echo json_encode($param);
                }
                else
                {
                    $param['status'] = 0;
                    $param['reload'] = 0;
                    $param['txt'] = 'Due to some error, Comment not send';
        
                    echo json_encode($param);
                }               
            }
            else
            {

                $param['status'] = 0;
                $param['reload'] = 0;
                $param['txt'] = validation_errors();
                echo json_encode($param);
            }
        }

    }
    // Category page
    public function category($cat_slug='')
    {
        if(empty($cat_slug)){
            redirect('/');
        }
        else{
            // Check category slug
            $category = $this->model_blog_category->find_by_slug($cat_slug);
            if(array_filled($category)){
                // Get banner
                $data['banner'] = $this->model_banner->get_banners(8);
                // Get categories
                $data['categories'] = $this->get_categories();
                // Get recent post
                $data['recent'] = $this->model_blog->get_recent_post();
                // Set data
                $data['blog_info'] = $this->_category_pagination($cat_slug,$category['blog_category_id']);
                // Load view
                $this->load_view("category" , $data);
            }
            else{
                redirect('/');
            }
        }
    }

    // Blog post pagination
    private function _category_pagination($cat_slug, $cat_id)
    {
        $this->load->library('mypagination');

        $pagination["base_url"] = g('base_url') . $this->router->fetch_class()."/category/".$cat_slug."/page/";
        $pagination["total_rows"] = $this->model_blog_category->get_total_count($cat_id);
        $pagination["per_page"] = 10;
        $pagination['use_page_numbers']  = TRUE;
        $pagination["uri_segment"] = 5;
        $pagination['last_tag_open'] = '';

        $this->mypagination->initialize($pagination);

        $page = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
        $vars["data"] = $this->model_blog_category
            ->get_pagination_data($pagination["per_page"], (($page > 0)?($page-1):($page)) * $pagination["per_page"], $cat_id);

        $vars["links"] = $this->mypagination->create_links();

        return $vars;
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */