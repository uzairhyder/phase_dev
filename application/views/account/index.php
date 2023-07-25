<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<?
// Banner heading
//$this->load->view('widgets/inner_banner');
// Banner section
?>

<!-- Main Heading Starts Here -->
<!--<div class="Inner_Banner" style="background: url('<?php /*echo get_image($banner['inner_banner_image_path'],$banner['inner_banner_image']);*/?>');">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h2>My Account</h2>
            </div>
        </div>
    </div>
</div>-->
<!-- Main Heading Ends Here -->

<?php
/*$data['breadcrumb_title'] = 'Dashboard';
$this->load->view('widgets/breadcrumb',$data);*/
?>

<!-- begin-section Our Process-->
<section class="accountSec">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-3 col-sm-3 col-xs-12 ">
                    <div class="inner_box  wow bounceIn" data-wow-duration="1.2s">
                        <div class="box">
                            <!--<img src="<?php /*echo g('images_root');*/?>icon1.png" alt="" class="hvr_none" alt="Our Process">
                            <img src="<?php /*echo g('images_root');*/?>icon11.png" alt="" class="hide" alt="Our Process">-->
                            <i class="fa fa-pencil-square" aria-hidden="true"></i>

                        </div>
                        <div class="style_div">
                            <h4><a href="<?php echo g('base_url');?>account/info">My Account</a> </h4>
                        </div>
                    </div>
                </div>
                <?php
                // Buyer
                if($this->user_type=='1'){?>
                    <div class="col-md-4 col-sm-4 col-xs-12 ">
                        <div class="inner_box  wow bounceIn" data-wow-duration="1.2s">
                            <div class="box">
                                <!--<img src="<?php /*echo g('images_root');*/?>icon2.png" alt="" class="hvr_none" alt="Our Process">
                            <img src="<?php /*echo g('images_root');*/?>icon22.png" alt="" class="hide" alt="Our Process">-->
                                <i class="fa fa-pencil" aria-hidden="true"></i>

                            </div>
                            <div class="style_div">
                                <h4><a href="<?php echo g('base_url');?>account/orderhistory">My Orders</a> </h4>
                            </div>
                        </div>
                    </div>
                <?php }
                // Seller
                else{?>
                  <!--   <div class="col-md-3 col-sm-3 col-xs-12 ">
                        <div class="inner_box  wow bounceIn" data-wow-duration="1.2s">
                            <div class="box"> -->
                                <!--<img src="<?php /*echo g('images_root');*/?>icon2.png" alt="" class="hvr_none" alt="Our Process">
                            <img src="<?php /*echo g('images_root');*/?>icon22.png" alt="" class="hide" alt="Our Process">-->
                           <!--      <i class="fa fa-bars" aria-hidden="true"></i>

                            </div>
                            <div class="style_div">
                                <h4><a href="<?php echo g('base_url');?>seller_dashboard/product">My Products</a> </h4>
                            </div>
                        </div>
                    </div> -->
                <?php }
                ?>
                <div class="col-md-4 col-sm-4 col-xs-12 ">
                    <div class="inner_box  wow bounceIn" data-wow-duration="1.2s">
                        <div class="box">
                            <!--<img src="<?php /*echo g('images_root');*/?>icon1.png" alt="" class="hvr_none" alt="Our Process">
                            <img src="<?php /*echo g('images_root');*/?>icon11.png" alt="" class="hide" alt="Our Process">-->
                            <i class="fa fa-key" aria-hidden="true"></i>
                        </div>
                        <div class="style_div">
                            <h4><a href="<?php echo g('base_url');?>account/change-password">Change Password</a> </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 ">
                    <div class="inner_box  wow bounceIn" data-wow-duration="1.2s">
                        <div class="box">
                            <!--<img src="<?php /*echo g('images_root');*/?>icon4.png" alt="" class="hvr_none" alt="Our Process">
                            <img src="<?php /*echo g('images_root');*/?>icon44.png" alt="" class="hide" alt="Our Process">-->
                            <i class="fa fa-sign-out" aria-hidden="true"></i>

                        </div>
                        <div class="style_div">
                            <h4><a href="<?php echo g('base_url');?>user/logout">Logout</a> </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End: Our Process -->