<?
// Banner heading
$this->load->view('widgets/inner_banner');
// Banner section
?>

<!-- Content -->
<div class="contactsecm" id="login">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
                <h4>Login</h4>
                <div class="login_bg">
                    <!--<div class="social">
                        <p> Login with social media </p>
                        <ul>
                            <li><a href="#" class="active"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#" class=""><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"> <i class="fa fa-linkedin" aria-hidden="true"></i> </a> </li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>-->
                    <form action="<?php echo g('base_url');?>user/login-process" method="post" id="login-form" class="loginForm">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="signup[signup_email]" id="email" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="password" class="form-control" name="signup[signup_password]" id="password" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <!--<div class="col-md-6">
                            <div class="checkbox" align="left">
                                <label>
                                    <input type="checkbox" value="">
                                    Remember me </label>
                            </div>
                        </div>-->
                        <div class="col-md-12">
                            <div class="forget-pass" align="right">  <a href="#" data-toggle="modal" data-target="#forgot-password"> <span> Forget Password? </span> </a></div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="javascript:void(0)" id="btn-login"><input type="submit" class="form-control" name="" value="Login"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="no-acount"> <a href="<?php echo g('base_url');?>user/signup"> Don't have an account?  </a></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
// Load modal
$this->load->view('user/modal_forgot_password');
?>

<!-- Content -->

<!-- Login and forgot pass ajax start-->
<script type="text/javascript">
    $(document).ready(function () {
        var $form = $('#login-form');
        // On submit login action start
        //$form.submit(function(event) {
        $('#btn-login').click(function (event) {
            // Get input data
            var email = $('#email').val();
            var password = $('#password').val();
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
            }
            else if (!regex.test(email)) {
                AdminToastr.error('<span for="%s" style="color:#fff" class="has-error help-block">Invalid email address</span>');
            }
            // Password validation
            else if (password == '') {
                AdminToastr.error('<span for="%s" style="color:#fff" class="has-error help-block">Password field is required.</span>');
            }
            else {
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
            // Get form obj
            var $form = $('#forgot-form');
            // Get form
            var form = $(this).closest('form');
            // Get action and form data
            var data = form.serialize();
            var url = form.attr('action');

            Loader.show();
            setTimeout(function () {
                // Submit action
                var response = AjaxRequest.fire(url, data);
                // Register success
                if (response.status) {
                    // Reset form
                    $form[0].reset();
                    // Close Dialog box
                    $('#forgot-password').modal('toggle');
                    // Reset captcha
                    grecaptcha.reset();

                }
            },1000);

            return false;
        });
        // Submit Form Modal End
    });
</script>

<!--FACEBOOK LOGIN START-->
<script>
    var test;
    window.fbAsyncInit = function () {
        FB.init({
            appId: '1535745989876524',
            cookie: true,
            xfbml: true,
            version: 'v2.11'
        });
        FB.AppEvents.logPageView();
        checkLoginState();
    };
    function returnLoginStateFB() {
        var result = '';
        FB.getLoginStatus(function (response) {
            result = response.status;
        });
        return result;
    }

    function login() {
        FB.api('/me', {locale: 'en_US', fields: 'name, email'},
            function (e) {

                var id = e.id;
                var email = e.email;
                var name = e.name;

                var data = {id: id, email: email, name: name};

                var url = "<?=l('hauth/fb_login')?>";
                var response = AjaxRequest.fire(url, data);

                if (response.status) {
                    location.reload();
                }
                else {
                    //window.location = response.url;
                }


            }
        );
    }

    function logoutFB() {
        FB.logout(function (response) {
            checkLoginState();
        });
    }
    function loginFB() {

        FB.login(function (response) {
            checkLoginState();
            login();
        }, {scope: 'email,public_profile,user_friends'});
        login();

    }

    function checkLoginState() {
        FB.getLoginStatus(function (response) {
            console.log("1");
            if (response.status == 'connected') {
                $('#fbLinkLog').html('').append('<a id="linkId" href="#" onclick="logoutFB();"> Logout</a>');
            }
            else {
                $('#fbLinkLog').html('').append('<a id="linkId" href="#" onclick="loginFB();"> Login</a>');
            }
        });
    }
    function showError(id, msg) {
        $('#' + id).html('');
        $('#' + id).show();
        $('#' + id).html('<div class="alert alert-danger fade in alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">Ã—</a><strong>Error!</strong> ' + msg + '.</div>').delay(1000).fadeOut();
    }
    function showSuccess(id, msg) {
        $('#' + id).html('');
        $('#' + id).show();
        $('#' + id).html('<div class="alert alert-success"><strong>Success! </strong>' + msg + '</div>').delay(1000).fadeOut();
    }
    function postOnwallFB() {
        var checkLinked = $('#check-fb').prop('checked');
        if (!checkLinked) return;
        if (returnLoginStateFB() == 'connected') {
            var hash = {link: $('#link').val(), url: $('#imagepath').val()};
            var postingMethod = false;
            var prefix = '';
            if (hash['url'] == "" && hash['link'] == "") {
                postingMethod = true;
            }
            if (hash['link'] != "" && !postingMethod) {
                hash['message'] = $('#fb_description').val();
                hash['link'] = $('#link').val();
                postingMethod = true;
                prefix = 'feed';
            }
            if (hash['url'] != "" && !postingMethod) {
                hash['message'] = $('#fb_description').val();
                postingMethod = true;
                prefix = 'photos';
            }
            FB.api('/me/' + prefix, 'post', hash, function (response) {
                if (!response || response.error) {
                    showError('msg', 'Some error occured.');
                } else {
                    showSuccess('msg', 'Posted on your wall.');
                }
            });
        } else {
            showError('msg', 'Facebook Account is not logged in');
        }
    }
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<!--FACEBOOK LOGIN END-->