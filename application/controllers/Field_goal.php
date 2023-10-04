<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Field_goal extends MY_Controller
{

    /**
     * Contact US Controller
     */

    public function __construct()
    {
        $this->seo_id = 6;
        // Call the Model constructor latest_product
        parent::__construct();
    }

    // Default Page
    public function index()
    {
        global $config;

        $data['content1'] = $this->model_cms_page->get_page(16);

        // $this->layout_data['title'] = 'Field goal kicker | Field goal kicking | Phase 3 kicking';
        // $this->layout_data['meta_data']['keywords'] = '';
        // $this->layout_data['meta_data']['description'] = 'Featuring the best field goal kickers who have gone through intensive training of field goal training. Get enrolled in our football camp now and get your evaluations!';
        // Get banner
        $param['where']['banner_id'] = 12;
        $data['banner'] = $this->model_banner->find_one($param);
        $param1['order'] = 'field_goal_year_position asc';
        $data['field_goal_year'] = $this->model_field_goal_year->find_all_active($param1);
        //debug($data['field_goal_year'],1);
        $paramnavheading['order'] = 'nav_bar_number';
        $data['main_nav_headings'] = $this->model_nav_bar->find_all($paramnavheading);
        // Load View
        $this->load_view("index", $data);
    }


    public function detail($slug = '')
    {

        $this->layout_data['title'] = 'Phase 3 Kicking';
        $this->layout_data['meta_data']['keywords'] = '';
        $this->layout_data['meta_data']['description'] = 'Phase 3 Kicking';

        $data['prospect_detail'] = $this->model_cms_page->find_by_pk(3);
        $data['prospect'] = $this->model_prospect->find_all_active();
        // debug($data['prospect_detail'],1);
        $para10['where']['headings_id'] = 10;
        $data['heading10'] = $this->model_headings->find_one($para10);

        $paramnavheading['order'] = 'nav_bar_number';
        $data['main_nav_headings'] = $this->model_nav_bar->find_all($paramnavheading);
        // has slug
        if (!empty($slug)) {
            // Get slug response
            // $data['field_goal_detail'] = $this->model_field_goal_year->find_by_slug($slug);
            //debug($field_goal_detail['field_goal_year_title']);

            // Found slug in table
            // if(array_filled($data['field_goal_detail']))
            // {
            //     //$data['banner'] = $this->model_banner->get_banners(8);
            //     // Set product info
            //     // $data['detail'] = $field_goal_detail;
            //     $data['field_goal_year_id'] = $data['field_goal_detail']['field_goal_year_id'];
            //     //debug($field_goal_year_id,1);
            //     $param['where']['field_goal_ranking_year'] = $data['field_goal_year_id'];
            //     // $param['order'] = 'field_goal_ranking_prospect DESC';
            //     $param['order'] = 'field_goal_ranking_position ASC';
            //     $param['order'] = 'field_goal_ranking_createdon';
            //     $param['joins'][] = array(
            //       "table"=>"field_goal_year" ,
            //       "joint"=>"field_goal_year.field_goal_year_id = field_goal_ranking.field_goal_ranking_year"
            //       );
            //     $data['field_goal_ranking'] = $this->model_field_goal_ranking->find_all($param);
            //     // debug($data['field_goal_ranking'],1);

            //     // Save record recent
            //     // if($this->userid>0){
            //     //     $this->model_recent_product->save_record($this->userid, $product_id);
            //     // }
            //     // Load view
            //     $this->load_view("detail" , $data);
            // }
            // // Not found
            // else
            // {
            //     redirect(l('404') , true);
            // }

            $year['field_goal_detail'] = $this->model_field_goal_year->find_by_slug($slug);
            // debug($year['kicker_detail'],1);

            $this->db->select('*');
            $this->db->from('mk_field_goal_ranking f');
            $this->db->join('mk_field_goal_year pos', 'f.field_goal_ranking_year = pos.field_goal_year_id', 'inner');
            $this->db->where('f.field_goal_ranking_year =', $year['field_goal_detail']['field_goal_year_id']); // Filter by year
               $this->db->where('f.field_goal_ranking_status !=',2);
            $this->db->order_by('f.field_goal_ranking_prospect', 'DESC');
            $this->db->order_by('f.field_goal_ranking_position', 'ASC');
            $query = $this->db->get();
            $data['field_goal_ranking'] = $query->result();

            $this->load_view("detail", $data);
        }
        // No slug
        else {
            redirect(l('404'), true);
        }
    }

    public function get_field_goal_ranking()
    {


        $id =  $_POST['id'];
        $year =  $_POST['year'];
        // debug($year,1);

        // $que1 = $this->db->query("SELECT * FROM mk_field_goal_ranking ORDER BY field_goal_ranking_prospect = ".$id." DESC")->row_array();

        $param['order'] = '4 DESC';
        $data['field_goals'] = $this->model_field_goal_ranking->find_all_active($param);
        //debug($data['field_goals'],1);
        // $que1 = $this->db->query("SELECT * FROM mk_field_goal_ranking WHERE field_goal_ranking_year = ".$year." ORDER BY field_goal_ranking_prospect = ".$id." DESC")->result_array();
        $que1 = $this->db->query("SELECT * FROM mk_field_goal_ranking WHERE field_goal_ranking_year = " . $year . " AND field_goal_ranking_prospect = " . $id . " ORDER BY field_goal_ranking_position ASC ")->result_array();

        //debug($que1,1);


        $para['where']['field_goal_year_id'] = $year;
        $grad_year = $this->model_field_goal_year->find_one_active($para);
        // debug($grad_year);
        $grad_year_title = $grad_year['field_goal_year_title'];
        // debug($grad_year_title,1);
        $str = '';
        foreach ($que1 as $key => $value) {
            if ($value['field_goal_ranking_prospect'] == 2) {
                $rankings = "Still Developing";
            } elseif ($value['field_goal_ranking_prospect'] == 2.5) {
                $rankings = "Developing with Minor Adjustments";
            } elseif ($value['field_goal_ranking_prospect'] == 3) {
                $rankings = "D3 Ready";
            } elseif ($value['field_goal_ranking_prospect'] == 3.5) {
                $rankings = "D2 Potential";
            } elseif ($value['field_goal_ranking_prospect'] == 4) {
                $rankings = "D2 Ready";
            } elseif ($value['field_goal_ranking_prospect'] == 4.5) {
                $rankings = "D1 FCS Ready";
            } elseif ($value['field_goal_ranking_prospect'] == 5) {
                $rankings = "D1 FBS Group 5 Ready";
            } elseif ($value['field_goal_ranking_prospect'] == 6) {
                $rankings = "D1 FBS Power 5 Ready";
            } elseif ($value['field_goal_ranking_prospect'] == 7) {
                $rankings = "D1 FBS Ready";
            }

            $str .= '<tr>' .
                '<input type="hidden"  value=' . $value['field_goal_ranking_id'] . ' class="get_id">' .
                '<td>' . ++$counter . '</td>' .
                '<td>' . $value['field_goal_ranking_title'] . '</td>' .
                '<td>' . $value['field_goal_ranking_last_name'] . '</td>' .
                '<td>' . $grad_year_title . '</td>' .
                '<td>' . $value['field_goal_ranking_state'] . '</td>' .
                '<td>' . $value['field_goal_ranking_offers'] . '</td>' .
                '<td>' . $value['field_goal_ranking_commited'] . '</td>' .
                '<td>' . $rankings . '</td>' .

                '</tr>';
        }
        //debug($str,1);

        if (count($que1) > 0)
            echo json_encode(array('status' => 1, 'html' => $str));
        else
            echo json_encode(array('status' => 0, 'html' => $str));
    }

    public function set_positions()
    {
        //debug($_REQUEST);
        // debug(1,1);
        $str = explode(',', $_POST['str']);



        $data = array_filter($str);

        //debug($data,1);

        foreach ($data as $key => $value) {
            $param['field_goal_ranking_position'] = $key;
            $this->model_field_goal_ranking->update_by_pk($value, $param);
        }

        $param['status'] = 1;
        $param['txt'] = 'success';
        echo json_encode($param);
    }
}
