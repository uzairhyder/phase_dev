<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends MY_Controller {

	/**
	 * Account Controller
	 *
	 */
	
	public function __construct()
    {
    	// Call the Model constructor latest_product
        parent::__construct();
    }

    // Default Profile page
	public function index()
	{ 
		if($this->userid <= 0){
			redirect(g('base_url').'user/index');
		}
		global $config;
        // Set banner heading
        //$data['banner_heading'] = "My Account";

        $data['banner'] = $this->model_inner_banner->get_banner(16);
        // Get and set cms data
        $data['content'] = $this->model_cms_page->get_page(12);
        // Get banner
        // $data['banner'] = $this->model_banner->get_banners(8);

        //$data['banner'] = $this->model_inner_banner->find_by_pk(2);
		$this->load_view("index" , $data);
	}

    // Account info page
	public function info(){
		if($this->userid <= 0){
			redirect(g('base_url').'user/login');
		}
		global $config;
        //$model = $this->cuser_model;
		//$this->add_script(array('innerstyle.css','font-awesome.min.css'));
		$data['userEmail'] = $this->session->userdata['logged_in']['email'];
		$data['userdata'] = $this->model_signup->find_by_pk($this->userid);

        // Get Countries
        $data['countries'] = $this->model_country->find_all_active();

		//$data['title'] = 'My Account Info';
        // Set banner heading
        $data['banner_heading'] = "Account Info";

        // 1:parent/teacher , 2:kid
        //$view = ($this->user_type==1)?'info':'kid/info';

		$this->load_view("info" , $data);
	}

    public function update_info()
    {
        $signup_data = $this->input->post('signup');

        if((count($_POST) > 0) && (array_filled($signup_data)))
        {
            if($this->validate("model_signup"))
            {
                $status = $this->model_signup->update_by_pk($this->userid,$signup_data);

                if($status > 0)
                {
                    // Update session
                    $this->model_signup->update_user_session($signup_data);

                    $param['status'] = 1;
                    $param['txt'] = 'Updated successfully.';
                    echo json_encode($param);
                }
                else
                {
                    $param['status'] = 0;
                    $param['txt'] = 'Fail to update record';
                    echo json_encode($param);
                }
            }
            else
            {
                $param['status'] = 0;
                $param['txt'] = validation_errors();
                echo json_encode($param);
            }
        }
        else{
            $param['status'] = 0;
            $param['txt'] = "Please enter required field";
            echo json_encode($param);
        }
    }


    public function orderhistory(){
		if($this->userid <= 0){
			redirect(g('base_url').'user/login');
		}
		global $config;
		$data['userEmail'] = $this->session->userdata['logged_in']['email'];
		
		/*$params['joins'][] = array(
            "table"=>"order_item" , 
            "joint"=>"order_item.order_item_order_id = order.order_id"
            );*/
		$params['order'] = "order_id DESC";
		$params['where']['order_user_id'] = $this->userid;
		$data['orders'] = $this->model_order->find_all($params);

		//$data['country'] = $this->model_country->find_all();

		$data['title'] = 'Order History';

		$this->load_view("orderhistory" , $data);
	}

    public function getinvoice(){

        $order_id = intval($_POST['order_id']);
        $data['order_detail'] = $this->model_order->find_by_pk($order_id);
        $data['order_items'] = $this->model_order_item->find_all(
            array('where'=>array('order_item_order_id'=>$order_id))
        );
        //debug($data['order_detail']);
        //debug($data['order_items']);

        $message = $this->load->view("account/invoiceTemplate",
            $data,
            true
        );
        echo $message;
    }

	public function mywishlist(){
		if($this->userid <= 0){
			redirect(g('base_url').'user/login');
		}
		global $config;
		$data['userEmail'] = $this->session->userdata['logged_in']['email'];
		$data['wishlist'] = $this->model_wishlist->find_all(
			array('where'=>array('wishlist_user_id'=>$this->userid)));
		
		//$data['country'] = $this->model_country->find_all();

		$data['title'] = 'My Wishlist';

		$this->load_view("wishlist" , $data);
	}

    public function my_favorites(){
        if($this->userid <= 0){
            redirect(g('base_url').'');
        }
        global $config;
        //$data['userEmail'] = $this->session->userdata['logged_in']['email'];

        /*$params['joins'][] = array(
            "table"=>"order_item" ,
            "joint"=>"order_item.order_item_order_id = order.order_id"
            );*/

        $data['banner_heading'] = "Account Info";

        $data['result'] = $this->model_favorite->get_my_fav($this->userid);
        //$data['country'] = $this->model_country->find_all();

        //$data['title'] = 'Order History';

        $this->load_view("my_favorites" , $data);
    }

	public function addwishlist(){
		if($this->userid <= 0){
			echo json_encode(array('status'=>0,'message'=>'You are not logged in'));
		}
		else{
			$data['wishlist_user_id'] = $this->userid;
			$data['wishlist_product_id'] = intval($_POST['product_id']);
			$status = $this->model_wishlist->insert_record($data);
			if($status > 0){
				echo json_encode(array('status'=>1,'message'=>'Your item has been added into your wishlist.'));
			}
			else{
				echo json_encode(array('status'=>0,'message'=>'Please try again'));
			}
		}
	}

    // Change password view
	public function change_password(){

        //debug(1,1);

		if($this->userid <= 0){
			redirect(g('base_url').'user/login');
		}
		global $config;
        $data['banner'] = $this->model_inner_banner->get_banner(16);
        // Get and set cms data
        $data['content'] = $this->model_cms_page->get_page(12);
		//$this->add_script(array('innerstyle.css','font-awesome.min.css'));
		$data['userEmail'] = $this->session->userdata['userdata']['email'];
		$data['userdata'] = $this->model_signup->find_by_pk($this->userid);

        // Set banner heading
        $data['banner_heading'] = "Change Password";

		$this->load_view("changepassword" , $data);
	}

    // update_password
	public function update_password(){
        //debug(1,1);
		if($this->userid <= 0){
			$param['status'] = 0;
			$param['txt'] = "you are not registered";
			echo json_encode($param);
		}
		else{
            $password = $this->input->post('signup');
            //debug($password['signup_password']);
			if((count($_POST) > 0) && (isset($password['signup_password'])) && (!empty($password['signup_password']))) {
				$param['signup_password'] = md5($password['signup_password']);
                //debug($param['signup_password']);
				$status = $this->model_signup->update_by_pk($this->userid,$param);
                //debug($status);
				if($status){
					$this->json_param['status'] = 1;
					$this->json_param['txt'] = 'Password has been changed.';
                    echo json_encode($this->json_param);
				}
			}
            else{
                $this->json_param['status'] = 0;
                $this->json_param['txt'] = 'Record Not Found.';
                echo json_encode($this->json_param);
            }
		}
	}


	public function resetpasswordclient(){
		$id = $_POST['id'];
  		//$encodedID = "yrt15".$result['id']."xyurt8576412";
  		$id = str_replace("yrt15", "", $id);
  		$id = str_replace("xyurt8576412", "", $id);

  		if(isset($_POST['password']) && empty($_POST['password'])){
  			echo json_encode(array('status'=>0,'txt'=>'Please provide the password'));
  		}
  		else{
  			$password = md5($_POST['password']);
  			$status = $this->model_signup->update_by_pk($id,array('signup_password'=>$password));
  			if($status){
  				echo json_encode(array('status'=>1,'txt'=>'Your password has been changed.'));		
  			}
  			else{
  				echo json_encode(array('status'=>0,'txt'=>'Please try again or use different password'));		
  			}
  		}
	}

    // Update profile image
    public function update_profile_image()
    {
        // Get User id
        $user_id = $this->userid;

        // Success
        if((count($_FILES)>0) && ($user_id!=null)){
            // Get temp file
            $tmp = $_FILES['file']['tmp_name'];
            // Generate file name
            $name = mt_rand().$_FILES['file']['name'];

            // Get upload path
            $upload_path = $this->config->item('site_upload_signup');

            // Set data
            $data = array(
                'signup_logo_image' => $name,
                'signup_logo_image_path' => $upload_path,
            );

            // Remove old file
            /*if(!empty($this->session->userdata('userdata')['signup_image'])){
                unlink($this->config->item('site_upload_user_photo') . basename($this->session->userdata('userdata')['signup_image']));
            }*/

            // Not remove default profile image
            /*if(basename($this->session->userdata('userdata')['signup_image'])!=$this->config->item('default_profile_image')){
                unlink($this->config->item('site_upload_user_photo') . basename($this->session->userdata('userdata')['signup_image']));
            }*/

            // Upload new file
            move_uploaded_file( $tmp,$upload_path.$name);

            $inserted_id = $this->model_signup->update_by_pk($user_id, $data);

            if($inserted_id > 0)
            {
                $profile_image_url = array(
                    'signup_image'=>$upload_path . $name
                );
                // Update session profile
                $this->model_signup->update_user_session($profile_image_url);
                // save log ends

                $this->json_param['status'] = true;
                $this->json_param['txt'] = 'Updated successfully.';
            }
            else{
                $this->json_param['status'] = false;
                $this->json_param['txt'] = 'Something went wrong.Please try later.';
            }
        }
        // Error
        else{
            $this->json_param['status'] = false;
            $this->json_param['txt'] = lang('something_wrong');
        }

        echo json_encode($this->json_param);

    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */