<?
// Banner heading
//$this->load->view('widgets/inner_banner');
// Banner section
?>

<!-- Content -->
<!-- <div class="contactsecm" id="login">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
                <h4>Sign Up</h4>
                <div class="login_bg">

                    <form method="post" action="<?php echo g('base_url');?>user/save" id="signupForm">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="signup[signup_firstname]"  placeholder="First Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="signup[signup_lastname]"  placeholder="Last Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="signup[signup_email]"  placeholder="Email ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="password" class="form-control" name="signup[signup_password]"  placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox" align="left">
                                <label>
                                    <input type="checkbox" name="checkbox">
                                    I Agree To The <a href="<?php echo g('base_url');?>terms-and-conditions" target="_blank">Terms & Conditions</a> </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="javascript:void(0)"><input type="submit" class="form-control" name="" value="Sign Up" id="btn-signup"></a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="col-md-12">
                        <div class="no-acount"> Don't have an Account? <a href="<?php echo g('base_url');?>user/login"> Login Now!</a></div>
                    </div></div>
            </div>
        </div>
    </div>
</div> -->

<!--end Content -->

<!-- Sign up ajax start-->
<!-- <script type="text/javascript">
    $(document).ready(function(){
        // Get form object
        var $form = $('#signup-form');
        // On submit action start
        //$form.submit(function(event) {
        $('#btn-signup').click(function(event) {

            // Disable the submit button to prevent repeated clicks:
            $form.find('#btn-signup').prop('disabled', true);
            // Get form
            var form = $(this).closest('form');
            // Get action url
            var url = form.attr('action');
            // Get form data
            var data = form.serialize();
            // Submit action
            var response = AjaxRequest.fire(url, data);
            // Register success
            if (response.status) {
                $form.find('#btn-signup').prop('disabled', false);
                // Reset form
                $form[0].reset();
                setTimeout(function(){
                    location.href = '<?=g('base_url')?>';
                },2000);

            }
            // Register fail
            else {
                // Enable form
                $form.find('#btn-signup').prop('disabled', false);
            }

            event.preventDefault();
            return false;
        });
        // On submit action end
    });
</script> -->

<div class="row mt-5">
    <div class="col-md-12 sbhfirst text-center">
        <h2 style="margin-bottom: 0;">Hello!</h2>
        <p style="margin-bottom: 0;">Sign in to Your Account</p>
    </div>
</div>
    <div class="wrapper">
  <div id="formContent" class="justify-content-center">
    <!-- Tabs Titles -->

    <!-- Login Form -->
  
    <form class="form-center" method="post" action="<?php echo g('base_url');?>user/save" id="signupForm">
      <input type="text" id="FullName" class="signthird" name="signup[signup_name]" placeholder="Full Name" wid>
      <input type="text" id="email" class="signthird" name="signup[signup_email]" placeholder="Email">
      <input type="password" id="password" class="signthird" name="signup[signup_password]" placeholder="Password">
      <input type="password" id="confirmPassword" class="signthird" name="signup_password_confirm" placeholder="Confirm Password">

    <!-- Remind Passowrd -->
<!--     <div class="row" id="formFooter">
        <div class="col-md-5 forgot">
            <input type="radio" id="remember" name="remember" value="remember"><a>Remember me</a>
        </div>
        <div class="col-md-6">
            <a class="underlineHover" href="#">Forgot Password?</a>
        </div>
    </div> -->
    <div class="row submit-sign">
        <!-- <a href="#"><img src="<?=g('images_root')?>sign.png"></a> -->
   <!--      <a href="javascript:void(0)"><input type="submit" class="form-control" name="" value="Sign Up" id="btn-signup"></a> -->
        <button type="submit" class="btn submit_btn bbtn" id="btn-signup">Sign Up</button>
    </div>
    </form>
  </div>
</div>

<div class="row mt-5">
    <div class="col-md-12 sbhfirst text-center">
        <p>OR</p>
        <p style="margin-bottom: 0;">Already have an account
            <a href="<?=g('base_url')?>user">Sign in</a>
        </p>
    </div>
</div>


<script type="text/javascript">

    $(document).ready(function(){

        var file_type = ['png', 'jpg', 'jpeg'];

        // On change file (single image)
        $('#file1').on('change',function(){

            var anyWindow = window.URL || window.webkitURL;

            var fileList = this.files;
            var result = check_file_extension(fileList);
            if(result!=''){
                $('#file1').val('');
                AdminToastr.error(result, 'Error');
            }
            else
            {
                var objectUrl = anyWindow.createObjectURL(fileList[0]);
                $('#profileImg').attr('src', objectUrl);
                $('#profileImg').show();
            }
        });

        function check_file_extension(fileList)
        {
            var error = '';
            // Check each file type extension
            for (var x = 0; x < fileList.length; x++) {
                // Define allow extension
                var ext = fileList[x]['name'].split('.').pop().toLowerCase();

                // Check ext empty or not (empty means no file selected)
                if (ext != '') {
                    // Other extension
                    if ($.inArray(ext, file_type) == -1) {
                        // Set error message
                        error += "Invalid file type <br/>" + fileList[x]['name'] + '<br/>';
                    }
                }
            }   // end loop
            return error;
        }

    });
</script>