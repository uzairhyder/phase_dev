<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Snapper extends MY_Controller
{

    /**
     * Contact US Controller
     */

    public function __construct()
    {
        $this->seo_id = 8;
        // Call the Model constructor latest_product
        parent::__construct();
    }

    // Default Page
    public function index()
    {
        global $config;

        // $this->layout_data['title'] = 'Long Snapping Ranking | Long Snap Specialist | Phase3kicking';
        // $this->layout_data['meta_data']['keywords'] = '';
        // $this->layout_data['meta_data']['description'] = 'Featuring the best long snapping specialists. All the evaluations of the football snappers are done in a very controlled environment that depicts the actual college game.';

        $data['content1'] = $this->model_cms_page->get_page(14);


        // Get banner
        $param['where']['banner_id'] = 5;
        $data['banner'] = $this->model_banner->find_one($param);
        $param1['order'] = 'snapper_year_position asc';
        $data['snapper_year'] = $this->model_snapper_year->find_all_active($param1);
        //debug($data['snapper_year'],1);
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

        $data['prospect_detail'] = $this->model_cms_page->find_by_pk(5);
        $data['prospect'] = $this->model_prospect->find_all_active();

        $para12['where']['headings_id'] = 12;
        $data['heading12'] = $this->model_headings->find_one($para12);
        //debug(1,1);
        $paramnavheading['order'] = 'nav_bar_number';
        $data['main_nav_headings'] = $this->model_nav_bar->find_all($paramnavheading);
        // has slug
        if (!empty($slug)) {
            // Get slug response
            // $data['snapper_detail'] = $this->model_snapper_year->find_by_slug($slug);
            //debug($snapper_detail['snapper_year_title']);

            // Found slug in table
            // if(array_filled($data['snapper_detail']))
            // {
            //     //$data['banner'] = $this->model_banner->get_banners(8);
            //     // Set product info
            //     // $data['detail'] = $snapper_detail;
            //     $data['snapper_year_id'] = $data['snapper_detail']['snapper_year_id'];
            //     //debug($snapper_year_id);
            //     // Get product images
            //     $param['where']['snapper_ranking_year'] = $data['snapper_year_id'];
            //     // $param['order'] = 'snapper_ranking_prospect DESC';
            //     $param['order'] = 'snapper_ranking_position ASC';
            //      $param['order'] = 'snapper_ranking_createdon';
            //     $param['joins'][] = array(
            //       "table"=>"snapper_year" ,
            //       "joint"=>"snapper_year.snapper_year_id = snapper_ranking.snapper_ranking_year"
            //       );
            //     $data['snapper_ranking'] = $this->model_snapper_ranking->find_all_active($param);
            //     //debug($data['snapper_ranking'],1);

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
            $year['snapper_detail'] = $this->model_snapper_year->find_by_slug($slug);
            // debug($year['kicker_detail'],1);
            $this->db->select('*');
            $this->db->from('mk_snapper_ranking s');
            $this->db->join('mk_snapper_year pos', 's.snapper_ranking_year = pos.snapper_year_id', 'inner');
            $this->db->where('s.snapper_ranking_year =', $year['snapper_detail']['snapper_year_id']); // Filter by year
            $this->db->where('s.snapper_ranking_status !=',2);
            $this->db->order_by('s.snapper_ranking_prospect', 'DESC');
            $this->db->order_by('s.	snapper_ranking_position', 'ASC');
            $query = $this->db->get();
            $data['snapper_ranking'] = $query->result();
            $this->load_view("detail", $data);
        }
        // No slug
        else {
            redirect(l('404'), true);
        }
    }

    public function get_snapper_ranking()
    {


        $id =  $_POST['id'];
        $year =  $_POST['year'];
        // debug($year,1);

        // $que1 = $this->db->query("SELECT * FROM mk_snapper_ranking ORDER BY snapper_ranking_prospect = ".$id." DESC")->row_array();

        // $param['order'] = '4 DESC';
        // $data['snapper'] = $this->model_snapper_ranking->find_all_active($param);
        //debug($data['snapper'],1);
        // $que1 = $this->db->query("SELECT * FROM mk_snapper_ranking WHERE snapper_ranking_year = ".$year." ORDER BY snapper_ranking_prospect = ".$id." DESC")->result_array();
        $que1 = $this->db->query("SELECT * FROM mk_snapper_ranking WHERE snapper_ranking_year = " . $year . " AND snapper_ranking_prospect = " . $id . " ORDER BY snapper_ranking_position ASC ")->result_array();
        //debug($que1,1);


        $para['where']['snapper_year_id'] = $year;
        $grad_year = $this->model_snapper_year->find_one_active($para);
        //debug($grad_year['snapper_year_title'],1);
        $grad_year_title = $grad_year['snapper_year_title'];

        $str = '';
        foreach ($que1 as $key => $value) {
            if ($value['snapper_ranking_prospect'] == 2) {
                $rankings = "Still Developing";
            } elseif ($value['snapper_ranking_prospect'] == 2.5) {
                $rankings = "Developing with Minor Adjustments";
            } elseif ($value['snapper_ranking_prospect'] == 3) {
                $rankings = "D3 Ready";
            } elseif ($value['snapper_ranking_prospect'] == 3.5) {
                $rankings = "D2 Potential";
            } elseif ($value['snapper_ranking_prospect'] == 4) {
                $rankings = "D2 Ready";
            } elseif ($value['snapper_ranking_prospect'] == 4.5) {
                $rankings = "D1 FCS Ready";
            } elseif ($value['snapper_ranking_prospect'] == 5) {
                $rankings = "D1 FBS Group 5 Ready";
            } elseif ($value['snapper_ranking_prospect'] == 6) {
                $rankings = "D1 FBS Power 5 Ready";
            } elseif ($value['snapper_ranking_prospect'] == 7) {
                $rankings = "D1 FBS Ready";
            }

            $str .= '<tr>' .
                '<input type="hidden"  value=' . $value['snapper_ranking_id'] . ' class="get_id">' .
                '<td>' . ++$counter . '</td>' .
                '<td>' . $value['snapper_ranking_title'] . '</td>' .
                '<td>' . $value['snapper_ranking_last_name'] . '</td>' .
                '<td>' . $grad_year_title . '</td>' .
                '<td>' . $value['snapper_ranking_state'] . '</td>' .
                '<td>' . $value['snapper_ranking_offers'] . '</td>' .
                '<td>' . $value['snapper_ranking_commited'] . '</td>' .
                '<td>' . $rankings . '</td>' .

                '</tr>';
        }

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

        // debug($data,1);

        foreach ($data as $key => $value) {
            $param['snapper_ranking_position'] = $key;
            $this->model_snapper_ranking->update_by_pk($value, $param);
        }

        $param['status'] = 1;
        $param['txt'] = 'success';
        echo json_encode($param);
    }
}
