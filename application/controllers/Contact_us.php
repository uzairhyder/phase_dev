<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_us extends MY_Controller
{

    /**
     * Contact US Controller
     */

    public function __construct()
    {
        $this->seo_id = 11;
        // Call the Model constructor latest_product
        parent::__construct();
    }

    // Default Page
    public function index()
    {
        global $config;
        // Get banner
        $param['where']['banner_id'] =11;
        $data['banner'] = $this->model_banner->find_one($param);
        // Get cms work
        // $data['cms_info'] = $this->model_cms_page->get_page(2);
        // debug($data['cms_info'],1);
        $paramnavheading['order'] = 'nav_bar_number';
        $data['main_nav_headings'] = $this->model_nav_bar->find_all($paramnavheading);
        // Load View
        $this->load_view("index", $data);
    }

    /**
     * Store a newly created resource in storage. //
     */
    public function send()
    {

        if (count($_POST) > 0) {
            if ($this->validate("model_inquiry")) {
                $form_name = 'inquiry';
                $contact_us_data = $_POST['inquiry'];
                //$contact_us_data['inquiry_type'] = 'contactus';
                $contact_us_data['inquiry_status'] = 1;

                $inserted_id = $this->model_inquiry->insert_record($contact_us_data);
                // $this->model_inquiry->set_attributes($contact_us_data);
                // $inserted_id = $this->model_inquiry->save();

                if ($inserted_id > 0) {


                    $param['status'] = 1;
                    // $param['redirect'] = 1;
                    // $param['redirect_url'] = '';

                    $param['txt'] = 'Input Succesfully save';
                    echo json_encode($param);
                    // $subject = 'Contact Us Alert';
                    parent::email_structure_contact($form_name, $subject);
                } else {
                    $param['status'] = 0;
                    $param['txt'] = 'Due to some error, Input not send';
                    echo json_encode($param);
                }
            } else {

                // debug(,1);
                //debug($param,1);

                //$param['field_name'] = validation_errors_name();
                $param['status'] = 0;
                $param['txt'] = validation_errors();
                echo json_encode($param);
            }
        }
    }


    public function newsletter()

    {
        global $config;
        // debug($_POST,1);
        if (count($_POST) > 0) {
            if ($this->validate("model_newsletter")) {
                $form_name = 'newsletter';
                $data = $_POST['newsletter'];
                $data['newsletter_status'] = 1;
                $inserted_id = $this->model_newsletter->insert_record($data);
                // debug($inserted_id,1);

                if ($inserted_id > 0) {

                    $title = g('site_name') . '- Newsletter Subscription Notification';
                    $template = $this->load->view("_layout/email_template/newsletter", $data, true);
                    $to = $data['newsletter_email'];

                    $admin_to = g("db.admin.email");
                    $admin_template = $this->load->view("_layout/email_template/subscribe", $data, true);


                    if (ENVIRONMENT != "development") {

                        parent::client_email($to, $template, $title, $admin_to);
                        parent::client_email($admin_to, $admin_template, $title, $to);

                    }

                    $param['status'] = 1;
                    $param['txt'] = 'Thank you for registering for our Newsletter.';
                    echo json_encode($param);

                } else {
                    $param['status'] = 0;
                    $param['txt'] = 'Due to some error, email not send';
                    echo json_encode($param);
                }
            } else {
                $param['status'] = 0;
                $param['txt'] = validation_errors();
                echo json_encode($param);

            }

        }

    }


     public function store()
    {
        // debug($_POST,1);

        // Get post data
        $post = $this->input->post();
        // Success
        if (count($post) > 0) {
            // Get Captcha
            $captcha_answer = $this->input->post('g-recaptcha-response');

            // // Define Custom rules for captcha
            $custom_rule = array(
                'g-recaptcha-response' => array(
                    'field' => 'g-recaptcha-response',
                    'label' => 'Captcha',
                    'rules' => 'required'
                )
            );

            // Validation success
            if ($this->validate("model_inquiry", $custom_rule)) {
                // Verify user's answer
                //$response = $this->recaptcha->verifyResponse($captcha_answer);

                // Processing ...
                // if ($response['success']) {
                    // Get data
                    $contact_us_data = $post['inquiry'];
                    // Set status 1
                    $contact_us_data['inquiry_status'] = 1;
                    // Set attributes
                    $this->model_inquiry->set_attributes($contact_us_data);
                    // Save record
                    $inserted_id = $this->model_inquiry->save();

                    // Insert successfully
                    if ($inserted_id > 0) {
                        // Send Inquiry email to admin
                        if (ENVIRONMENT != 'development') {
                            $this->model_email->inquiry_email($post['inquiry']);
                        }
                        $this->json_param['status'] = 1;
                        $this->json_param['txt'] = 'Thank you for your inquiry.';
                    } else {
                        $this->json_param['status'] = 0;
                        $this->json_param['txt'] = 'Something went wrong.Please try later.';
                    }
                // } else {
                //     // Something goes wrong
                //     $this->json_param['status'] = 0;
                //     $this->json_param['txt'] = 'Captcha not verified';
                // }
            } // Validation error
            else {
                $this->json_param['status'] = 0;
                $this->json_param['txt'] = validation_errors();
            }
        } else {
            $this->json_param['status'] = 0;
            $this->json_param['txt'] = 'No parameters found';
        }

        echo json_encode($this->json_param);
    }


}
