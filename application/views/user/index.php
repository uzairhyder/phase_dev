<!--<section class="bannerSec">
        <img src="<?php /*echo get_image($banner['inner_banner_image_path'],$banner['inner_banner_image']);*/?>" class="img-responsive" alt="Banner">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h1>LOGIN / SIGN UP</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>-->

<!-- <section class="Inner_content Login">
    <div class="container">
        <div class="row">
            <div class="colx-s-12 col-sm-12 Middle">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>LogIn</h3>
                    <?php echo html_entity_decode($login['cms_page_content']);?>

                    <form action="<?php echo g('base_url'); ?>user/login_process" method="post" class="Login_form" id="login-form">
                        <div class="form-group">
                            <input type="text" id="email" name="signup[signup_email]" placeholder="Email" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="password" name="signup[signup_password]" id="password" placeholder="Password" class="form-control">
                        </div>

                        <p class="password"><a href="#" data-toggle="modal" data-target="#forgot-password" class="forgot-password cre">Forgot Password?</a></p>
                        <div class="clearfix"></div>

                        <div class="form-group">
                            <input type="submit" class="btn submit_btn" value="Login" id="btn-login">

                        </div>
                    </form>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Register Yourself</h3>
                    <?php echo html_entity_decode($register['cms_page_content']);?>

                    <form method="post" action="<?=g('base_url')?>user/save" id="signupForm" class="Login_form">
                        <div class="form-group">
                            <select name="signup[signup_type]" id="" class="form-control">
                                <option value="">Type</option>
                                <option value="1">Buyer</option>
                                <option value="2">Seller</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="signup[signup_name]" class="form-control" placeholder="Name">
                        </div>

                        <div class="form-group">
                            <input type="text" name="signup[signup_email]" class="form-control" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <input type="password" name="signup[signup_password]" class="form-control" placeholder="Password">
                        </div>

                        <div class="form-group">
                            <input type="password" name="signup_password_confirm" class="form-control" placeholder="ConfirmPassword">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn submit_btn" value="Register" id="btn-signup">

                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</section>
 -->


<div class="row mt-5">
    <div class="col-md-12 sbhfirst text-center">
        <h2 style="margin-bottom: 0;">Hello!</h2>
        <p style="margin-bottom: 0;">Sign in to Your Account</p>
    </div>
</div>
    <div class="wrapper">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Login Form -->
    <form action="<?php echo g('base_url'); ?>user/login_process" method="post" class="Login_form" id="login-form">
      <input type="text" id="email" class=" second" name="signup[signup_email] placeholder="login">
      <input type="password" id="password" class="third" name="signup[signup_password] placeholder="password">
    

    <!-- Remind Passowrd -->
    <div class="row" id="formFooter">
        <!-- <div class="col-md-6 forgot">
            <input type="radio" id="remember" name="remember" value="remember"><a>Remember me</a>
        </div> -->
        <div class="col-md-6">
            <!-- <a class="underlineHover" href="#">Forgot Password?</a> -->
            <a href="#" data-toggle="modal" data-target="#forgot-password" class="underlineHover forgot-password cre">Forgot Password?</a>
        </div>
    </div>
    <div class="row d-flex justify-content-center py-3 submit">
        <!-- <a href="#"><img src="<?=g('images_root')?>sign.png"></a> -->

        <button type="submit" class="btn submit_btn bbtn" id="btn-login">Login</button>
    </div>
    </form>
  </div>
</div>

<div class="row mt-5">
    <div class="col-md-12 sbhfirst text-center">
        <p style="margin-bottom: 0;">Don't have an account
            <a href="<?=g('base_url')?>user/signup">Create</a>
        </p>
    </div>
</div>
<?php
// Load modal
//$this->load->view('user/modal_forgot_password');
?>


    <script type="text/javascript">
    $(document).ready(function () {
        var $form = $('#login-form');
        // On submit login action start
        //$form.submit(function(event) {
        $('#btn-login').click(function (event) {
            // Get input data
            var email = $('#email').val();
            var password = $('#password').val();

            /*console.log(password);
            console.log(email);*/
            
            // Define regular expression
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            // Checking fields (both fields empty)
            if ((email == '') && (password == '')) {
                AdminToastr.error('<span for="%s" style="color:#fff" class="has-error help-block">Email field is required.</span>' +
                    '<span for="%s" style="color:#fff" class="has-error help-block">Password field is required.</span>', 'Error');
            }
            // Email validation
            else if (email == '') {
                AdminToastr.error('<span for="%s" style="color:#fff" class="has-error help-block">Email field is required.</span>');
            } else if (!regex.test(email)) {
                AdminToastr.error('<span for="%s" style="color:#fff" class="has-error help-block">Invalid email address</span>');
            }
            // Password validation
            else if (password == '') {
                AdminToastr.error('<span for="%s" style="color:#fff" class="has-error help-block">Password field is required.</span>');
            } else {
                // Disable the submit button to prevent repeated clicks:
                $form.find('#btn-login').prop('disabled', true);
                // Get form
                var form = $(this).closest('form');
                // Get action url
                var url = form.attr('action');
                // Get form data
                var data = form.serialize();
                Loader.show();
                setTimeout(function () {
                    // Submit action
                    var response = AjaxRequest.fire(url, data);
                    // Register success
                    if (response.status) {
                        $form.find('#btn-login').prop('disabled', false);
                        // Reset form
                        $form[0].reset();
                        // Redirect to Time line page
                        //window.location.href = response.refer;
                        location.reload();

                    }
                    // Register fail
                    else {
                        // Enable form
                        $form.find('#btn-login').prop('disabled', false);

                    }
                },1000);
            }

            return false;
        });
        // On submit login action end

        // Submit Form Modal Start
        $('.user-pass-rec-btn').on('click', function () {

            var obj_forgot = $(this);

            Loader.show();
            setTimeout(function () {
                // Get form obj
                var $form = $('#forgot-form');
                // Get form
                var form = obj_forgot.closest('form');
                // Get action and form data
                var data = form.serialize();
                var url = form.attr('action');

                // Submit action
                var response = AjaxRequest.fire(url, data);
                // Register success
                if (response.status) {
                    // Reset form
                    $form[0].reset();
                    // Close Dialog box
                    $('#forgot-password').modal('toggle');
                    setTimeout(function () {
                        location.reload();
                    },2000);

                }
            },1000);

            return false;
        });
        // Submit Form Modal End

    });
</script>