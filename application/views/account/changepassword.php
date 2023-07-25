<!-- Main Heading Starts Here -->
<div class="Inner_Banner" style="background: url('<?php echo get_image($banner['inner_banner_image_path'],$banner['inner_banner_image']);?>');">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <!--<h2>My Account</h2>-->
            </div>
        </div>
    </div>
</div>
<!-- Main Heading Ends Here -->


<?php
/*$data['breadcrumb_title'] = 'Change Password';
$this->load->view('widgets/breadcrumb', $data);*/
?>

<br/><br/><br/>

<? $this->load->view('account/header_main') ?>


<!-- BEGIN CONTENT -->
<div class="col-md-9 col-sm-7">


    <div class="content-page">


        <h3>Change Password</h3>


        <div class="row">

            <form id="forgotform" method="post">

                <div class="col-lg-6 col-md-6 col-sm-6">

                    <input type="password" name="signup[signup_password]"
                           class="form-control my-form-control my-margin-bottom-15" id="forgotpass" value=""
                           placeholder="Enter Your New Password *">

                    <div class="white-space-15"></div>
                    <br>
                    <a href="javascript:void(0)" id="typebtn" class="btn btn-danger cancel btnnext">Proceed</a>

                </div>


            </form>

        </div>


    </div>

</div>


<? $this->load->view('account/footer_main') ?>


<!-- END CONTENT -->