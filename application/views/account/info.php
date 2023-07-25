<? //$this->load->view('account/header_main') ?>

<?

/*if(!empty($userdata['signup_logo_image'])){
    $img = get_image($userdata['signup_logo_image_path'],$userdata['signup_logo_image']);
}
else{
    $img = g('images_root') ."fan-img.png";
}*/
?>

<?php
/*$data['breadcrumb_title'] = 'Edit Account';
$this->load->view('widgets/breadcrumb', $data);*/
?>

<br><br><br><br>

<? $this->load->view('account/header_main') ?>

<!-- BEGIN CONTENT -->
<div class="col-md-9 col-sm-7">
    <div class="content-page ">

        <div class="row">

            <!-- Profile image start -->
            <!--<div class="col-md-8">
                <div class="form-group">
                    <form action="<? /*=g('base_url').'account/update-profile-image'*/ ?>" method="post" enctype="multipart/form-data" id="form-image" class="profileimg">
                        <input type="hidden" name="signup_id" value="<? /*=$this->userid*/ ?>">
                        <img src="<? /*= $img */ ?>" alt="" class="img-circle" />
                          <div class="upload-btn-wrapper">
                            <label>Change Profile Image</label>
                          <button class="mybtn" >Upload a file</button>
                          <input type="file" name="file" id="btn-profile" / >
                          </div>
                    </form>
                </div>
            </div>-->
            <!-- Profile image end -->
            <div class="col-md-12">
                <form action="<?= g('base_url') ?>account/update_info"
                      method="post" id="saveForm" class="footTop">
                    <input type="hidden" name="signup[signup_password]"
                           value="<?= $userdata['signup_password'] ?>">
                    <input type="hidden" name="signup[signup_id]"
                           value="<?= $this->userid ?>">
                    <input type="hidden" name="signup[signup_type]"
                           value="<?= $userdata['signup_type'] ?>">

                    <div class="form-group col-md-6">
                        <label for="email">Name:</label>
                        <input type="text"
                               class="form-control my-form-control my-margin-bottom-15"
                               value="<?= $userdata['signup_name'] ?>"
                               placeholder="Name *"
                               name="signup[signup_name]">
                    </div>

                    <!--<div class="form-group col-md-6">
                        <label for="email">First Name:</label>
                        <input type="text"
                               class="form-control my-form-control my-margin-bottom-15"
                               value="<?/*= $userdata['signup_firstname'] */?>"
                               placeholder="Name *"
                               name="signup[signup_firstname]">
                    </div>-->

                    <!--<div class="form-group col-md-6">
                        <label>Last Name</label>
                        <input type="text"
                               class="form-control my-form-control my-margin-bottom-15"
                               value="<?/*= $userdata['signup_lastname']  */?>"
                               placeholder="Last Name *"
                               name="signup[signup_lastname]">
                    </div>-->

                    <div class="form-group col-md-6">
                        <label>Company</label>
                        <input type="text"
                               class="form-control my-form-control my-margin-bottom-15"
                               value="<?= $userdata['signup_company']  ?>"
                               placeholder="Company "
                               name="signup[signup_company]" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Address</label>
                        <input type="text"
                               class="form-control my-form-control my-margin-bottom-15"
                               value="<?= $userdata['signup_address'] ?>"
                               placeholder="Address"
                               name="signup[signup_address]">
                    </div>

                    <div class="form-group col-md-6">
                        <label>City</label>
                        <input type="text"
                               class="form-control my-form-control my-margin-bottom-15"
                               value="<?= (empty($userdata['signup_city'])) ? '' : $userdata['signup_city'] ?>"
                               placeholder="City"
                               name="signup[signup_city]" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label>State</label>
                        <input type="text"
                               class="form-control my-form-control my-margin-bottom-15"
                               value="<?= (empty($userdata['signup_state'])) ? '' : $userdata['signup_state'] ?>"
                               placeholder="State"
                               name="signup[signup_state]" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="text"
                               class="form-control my-form-control my-margin-bottom-15"
                               value="<?= $userdata['signup_email'] ?>"
                               placeholder="Your Email"
                               name="signup[signup_email]" readonly>
                    </div>
                    <!--<div class="form-group col-md-6">
                        <label>Username</label>
                        <input type="text"
                               class="form-control my-form-control my-margin-bottom-15"
                               value="<?/*= $userdata['signup_username'] */?>"
                               placeholder="Your Username"
                               name="signup[signup_username]" readonly>
                    </div>-->



                    <div class="form-group col-md-6">
                        <label>Zipcode</label>
                        <input type="text"
                               class="form-control my-form-control my-margin-bottom-15" min="0"
                               value="<?= ($userdata['signup_zip'] == 0) ? '' : $userdata['signup_zip'] ?>"
                               placeholder="Zipcode"
                               name="signup[signup_zip]">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Country</label>
                        <select name="signup[signup_country]" id=""
                                class="form-control my-form-control my-margin-bottom-15">
                            <option value="">Select Country</option>
                            <?php
                            foreach ($countries as $key => $value):?>
                                <option value="<?php echo $value['country']; ?>" <?php echo ($value['country'] == $userdata['signup_country']) ? 'selected' : '' ?>><?php echo $value['country']; ?></option>
                            <? endforeach;
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Phone</label>
                        <input type="number"
                               class="form-control my-form-control my-margin-bottom-15"
                               value="<?= ($userdata['signup_contact'] == 0) ? '' : $userdata['signup_contact'] ?>"
                               placeholder="Phone"
                               name="signup[signup_contact]" required>
                    </div>

                    <!--<label>Business Name</label>
                    <input type="text"
                           class="form-control my-form-control my-margin-bottom-15"
                           value="<? /*= $userdata['signup_business_name'] */ ?>"
                           placeholder="Business Name *"
                           name="signup[signup_business_name]">

                    <label>Company</label>
                    <input type="text"
                           class="form-control my-form-control my-margin-bottom-15"
                           value="<? /*= $userdata['signup_company'] */ ?>"
                           placeholder="Company"
                           name="signup[signup_company]">-->

                    <!--<label>Contact</label>
                    <input type="text"
                           class="form-control my-form-control my-margin-bottom-15"
                           value="<?/*= $userdata['signup_contact'] */?>"
                           placeholder="Contact"
                           name="signup[signup_contact]">-->
                    <!-- <label>Business Address</label>
                    <input type="text"
                           class="form-control my-form-control my-margin-bottom-15"
                           value="<? /*= $userdata['signup_address2'] */ ?>"
                           placeholder="Business Address"
                           name="signup[signup_address2]">-->

                    <!--<label>Industry</label>
                    <input type="text"
                           class="form-control my-form-control my-margin-bottom-15"
                           value="<? /*= $userdata['signup_industry'] */ ?>"
                           placeholder="Industry *"
                           name="signup[signup_industry]">-->

                    <!--<input type="text"
                                                                               class="form-control my-form-control my-margin-bottom-15"
                                                                               placeholder="Phone *"
                                                                               value="<? /*= $userdata['signup_telephone'] */ ?>"
                                                                               name="signup[signup_telephone]">-->

                    <div class="clearfix"></div>
                    <div class="col-lg-6 col-md-6 col-sm-6 mtop10">
                        <button value="Save Now" id="submitInfo" class="btn btn-warning">Save Now</button>
                        <br>
                        <br>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
<!-- END CONTENT -->

<? $this->load->view('account/footer_main') ?>

<script type="text/javascript">
    $(document).ready(function () {
        var obj;
        $("#submitInfo").click(function (e) {
            e.preventDefault();
            Loader.show();
            setTimeout(function () {
                // Prevent form submit
                var obj = $("#saveForm");
                // Get form data
                var data = obj.serialize();
                // Get post url
                var url = obj.attr('action');
                // Submit action
                var response = AjaxRequest.fire(url, data);
                if(response.status){
                    location.reload();
                }
                // Add return
                return false;
            },1000);
            return false;
        });

        // Profile image update start (not implement)
        $("#btn-profile").on('change', function () {
            // Get file obj
            var file_obj = $(this);
            // Define allow extension
            var ext = file_obj.val().split('.').pop().toLowerCase();

            // Check ext empty or not (empty means no file selected)
            if (ext != '') {
                // Other extension
                if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
                    file_obj.val('');
                    AdminToastr.error('Invalid file', 'Error');
                }
                // Upload file
                else {
                    var data = new FormData(document.getElementById("form-image"));
                    var url = $("#form-image").attr("action");

                    FileUploadScript.fire(url, data, 'json', true);

                }
            }
        });
        // Profile image update end

    });
</script>