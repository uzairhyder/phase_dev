<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends MY_Controller {

	/**
	 * Search Controller
	 */
	
	public function __construct()
    {
    	// Call the Model constructor latest_product
        parent::__construct();
    }

    // Default Page
    public function index()
    {
        // debug(1,1);
        // Has get value
        $type = $_GET['type'];

            if($type == 1){

                // if(isset($_GET['type']) && !empty($_GET['type'])){
                //    $type = htmlentities($_GET['type']);
                //    $param['where']['kicker_ranking_year'] = $type;    
                // }  
                // if(isset($_GET['search']) && !empty($_GET['search'])){
                //    $searchby = htmlentities($_GET['search']);
                //    $param['where_string'] = "kicker_ranking_title LIKE'%$searchby%'";    
                // }  
                if(isset($_GET['lastname']) && !empty($_GET['lastname'])){
                   $lastnameby = htmlentities($_GET['lastname']);
                   $param['where_string'] = "kicker_ranking_last_name LIKE'%$lastnameby%'";    
                } 
                if(isset($_GET['gradyear']) && !empty($_GET['gradyear'])){
                   $gradyearby = htmlentities($_GET['gradyear']);
                   $param['where_string'] = "kicker_ranking_year LIKE'%$gradyearby%'";  
                }
                if(isset($_GET['state']) && !empty($_GET['state'])){
                   $stateby = htmlentities($_GET['state']);
                   $param['where_string'] = "kicker_ranking_state LIKE'%$stateby%'";    
                }
                if(isset($_GET['rating']) && !empty($_GET['rating'])){
                   $ratingby = htmlentities($_GET['rating']);
                   $param['where']['kicker_ranking_prospect'] = $ratingby;    
                }

                $param['joins'][] = array(
                  "table"=>"kicker_year" ,
                  "joint"=>"kicker_year.kicker_year_id = kicker_ranking.kicker_ranking_year"
                  );
                $data['players'] = $this->model_kicker_ranking->find_all_active($param);                
                //debug($data['players'],1);
                
            }

            

            if($type == 2){
                // if(isset($_GET['type']) && !empty($_GET['type'])){
                //    $type = htmlentities($_GET['type']);
                //    $param['where']['punter_ranking_year'] = $type;    
                // }  
                if(isset($_GET['search']) && !empty($_GET['search'])){
                   $searchby = htmlentities($_GET['search']);
                   $param['where_string'] = "punter_ranking_title LIKE'%$searchby%'";    
                }  
                if(isset($_GET['lastname']) && !empty($_GET['lastname'])){
                   $lastnameby = htmlentities($_GET['lastname']);
                   $param['where_string'] = "punter_ranking_last_name LIKE'%$lastnameby%'";    
                } 
                if(isset($_GET['gradyear']) && !empty($_GET['gradyear'])){
                   $gradyearby = htmlentities($_GET['gradyear']);
                   $param['where']['punter_ranking_graduation_year'] = $gradyearby;    
                }
                if(isset($_GET['state']) && !empty($_GET['state'])){
                   $stateby = htmlentities($_GET['state']);
                   $param['where_string'] = "punter_ranking_state LIKE'%$stateby%'";    
                }
                if(isset($_GET['rating']) && !empty($_GET['rating'])){
                   $ratingby = htmlentities($_GET['rating']);
                   $param['where']['punter_ranking_prospect'] = $ratingby;    
                }

                $param['joins'][] = array(
                  "table"=>"punter_year" ,
                  "joint"=>"punter_year.punter_year_id = punter_ranking.punter_ranking_year"
                  );
                $data['players2'] = $this->model_punter_ranking->find_all_active($param);
            }

            if($type == 3){
                // if(isset($_GET['type']) && !empty($_GET['type'])){
                //    $type = htmlentities($_GET['type']);
                //    $param['where']['punter_ranking_year'] = $type;    
                // }  
                if(isset($_GET['search']) && !empty($_GET['search'])){
                   $searchby = htmlentities($_GET['search']);
                   $param['where_string'] = "snapper_ranking_title LIKE'%$searchby%'";    
                }  
                if(isset($_GET['lastname']) && !empty($_GET['lastname'])){
                   $lastnameby = htmlentities($_GET['lastname']);
                   $param['where_string'] = "snapper_ranking_last_name LIKE'%$lastnameby%'";    
                } 
                if(isset($_GET['gradyear']) && !empty($_GET['gradyear'])){
                   $gradyearby = htmlentities($_GET['gradyear']);
                   $param['where']['snapper_ranking_graduation_year'] = $gradyearby;    
                }
                if(isset($_GET['state']) && !empty($_GET['state'])){
                   $stateby = htmlentities($_GET['state']);
                   $param['where_string'] = "snapper_ranking_state LIKE'%$stateby%'";    
                }
                if(isset($_GET['rating']) && !empty($_GET['rating'])){
                   $ratingby = htmlentities($_GET['rating']);
                   $param['where']['snapper_ranking_prospect'] = $ratingby;    
                }

                $param['joins'][] = array(
                  "table"=>"snapper_year" ,
                  "joint"=>"snapper_year.snapper_year_id = snapper_ranking.snapper_ranking_year"
                  );
                $data['players3'] = $this->model_snapper_ranking->find_all_active($param);
            }
            // Set data
            // $data['item_info'] = $this->_pagination();
            //debug($data,1);
            // Load view
            $this->load_view("index" , $data);
     
        // Get value not found
      
    }

    public function get_years()
    {
         // debug($_POST,1);

        $id =  $_POST['id'];


        if($id == 1){
            $years = $this->model_kicker_year->find_all_active();
            $str = '';
            foreach ($years as $key => $value) {
                $str .= '<option value="'.$value['kicker_year_id'].'" >'.$value['kicker_year_title'].'</option>';
            }

              if(count($years) > 0)
                echo json_encode(array('status' => 1 , 'html' => $str));
            else
                echo json_encode(array('status' => 0 , 'html' => $str));
        }
        if($id == 2){
            $years = $this->model_punter_year->find_all_active();
            $str = '';
            foreach ($years as $key => $value) {
                $str .= '<option value="'.$value['punter_year_id'].'" >'.$value['punter_year_title'].'</option>';
            }

              if(count($years) > 0)
                echo json_encode(array('status' => 1 , 'html' => $str));
            else
                echo json_encode(array('status' => 0 , 'html' => $str));
        }
        if($id == 3){
            $years = $this->model_snapper_year->find_all_active();
            $str = '';
            foreach ($years as $key => $value) {
                $str .= '<option value="'.$value['snapper_year_id'].'" >'.$value['snapper_year_title'].'</option>';
            }

              if(count($years) > 0)
                echo json_encode(array('status' => 1 , 'html' => $str));
            else
                echo json_encode(array('status' => 0 , 'html' => $str));
        }



  }

    // Pagination
    private function _pagination()
    {
        $this->load->library('mypagination');

        $pagination["base_url"] = g('base_url') . $this->router->fetch_class()."/page/";
        $pagination["total_rows"] = $this->model_item->get_total_count();
        $pagination["per_page"] = 10;
        $pagination['use_page_numbers']  = TRUE;
        $pagination["uri_segment"] = 3;
        $pagination['last_tag_open'] = '';
        if(isset($_GET) && array_filled($_GET)){
            $suffix = '?'.http_build_query($_GET,'',"&amp;");
            $pagination['first_url'] = '1' . $suffix;
            $pagination['suffix'] = $suffix;
        }

        $this->mypagination->initialize($pagination);

        $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
        $vars["data"] = $this->model_item->get_pagination_data($pagination["per_page"], (($page > 0)?($page-1):($page)) * $pagination["per_page"]);

        $vars["links"] = $this->mypagination->create_links();

        return $vars;
    }



}
