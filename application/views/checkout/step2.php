<?
// Banner heading
//$this->load->view('widgets/inner_banner');
// Banner section
?>

<!-- Breadcrumbs -->
<?php
/*$data['breadcrumb_title'] = 'Order';
$this->load->view('widgets/breadcrumb',$data);*/
?>

<section class="Inner_content inner-cart">
    <div class="container">
        <div class="check-form">
            <div class="row">
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <form id="submitStep2" method="post">
                        <!--<div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="return-custmer">
                                        <a class="herelog" href="#">
                                            Returning customer? Click here to login</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="return-custmer">
                                        <a class="herelog" href="#">
                                            Have a coupon? Click here to enter your code</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Country" type="text">
                                </div>
                            </div>
                        </div>-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" id="f-name" name="order[order_firstname]" placeholder="First Name" type="text" value="<?php echo $userdata['signup_firstname'];?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" id="l-name" name="order[order_lastname]" placeholder="Last Name" type="text" value="<?php echo $userdata['signup_lastname'];?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="order[order_company]" id="company-name" placeholder="Company" value="<?php echo $userdata['signup_company'];?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="form-control" name="order[order_address1]" id="address" placeholder="Address" value="<?php echo $userdata['signup_address'];?>" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="town" name="order[order_city]" placeholder="City" value="<?php echo $userdata['signup_city'];?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="order[order_country]" class="form-control" >
                                        <?php
                                        foreach ($country as $key=>$value):
                                            $name = $value['country'];
                                            ?>
                                            <option value="<?php echo $name;?>" <?php echo ($name=='USA')?'selected':''?> ><?php echo $name;?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="order[order_phone]" id="phone" placeholder="Phone" value="<?php echo $userdata['signup_contact'];?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" name="order[order_email]" id="email" placeholder="Email" type="text" value="<?php echo $userdata['signup_email'];?>">
                                </div>
                            </div>
                        </div>
                        <!--<div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="checkbox-inline"><input type="checkbox" value="">Create an account</label>
                                </div>
                            </div>
                        </div>-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="order[order_note]" placeholder="Order Note" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                        <!--<div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="checkbox-inline"><input type="checkbox" value="">Ship to another address</label>
                                </div>
                            </div>
                        </div>-->
                    </form>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="check_detail">
                        <div class="first">
                            <h3>Product name</h3>
                            <?php
                            foreach ($cart_data as $key=>$value):?>
                                <h4><?php echo $value['name'];?><span>  - <?php echo price($value['price']);?></span></h4>
                            <?php endforeach;
                            ?>
                        </div>
                        <!--<h3>item subtotal <span>$297.00</span></h3>-->
                        <!--  <h3>your shipping <span>free</span></h3> -->
                        <h3>total price <span class="t-price"><?php echo price($cart_total);?></span></h3>
                        <form class="round-one">
                            <input name="order[order_merchant]" value="1" type="radio"> Stripe <img alt="" class="img-responsive" src="<?php echo g('images_root');?>01.png">
                        </form>
                        <form  class="round-one round-two">
                            <input name="order[order_merchant]" value="2" type="radio"> Paypal <img alt="" class="img-responsive" src="<?php echo g('images_root');?>img26.png">
                        </form>
                        <div class="read-agre">
                            <div class="form-group">
                                <label class="checkbox-inline"><input type="checkbox" value="" name="terms" id="terms-and-condition"><a href="<?php echo g('base_url');?>terms-and-conditions" target="_blank">I have read and agree to the website terms and conditions *</a></label>
                            </div>
                        </div>
                        <button id="btn-order">place order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="billingSec">
    <div class="container">
        <!--<form action="" method="post" id="submitStep2">-->
        <!--<form action="" method="post" id="">-->
            <div class="col-md-8 col-sm-8 col-xs-12">
                <!--<div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="billing-heading">
                            <h1>Billing Address</h1>
                        </div>
                    </div>
                </div>-->

                <!-- Billing address start -->
                <!--<div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="billing-form">
                            <label for="">First Name</label>
                            <input class="form-control" name="order[order_firstname]" placeholder="First Name *" type="text" value="<?php /*echo $userdata['signup_firstname'];*/?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="billing-form">
                            <label for="">Last Name</label>
                            <input class="form-control" name="order[order_lastname]" placeholder="Last Name *" type="text" value="<?php /*echo $userdata['signup_lastname'];*/?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="billing-form">
                            <label for="">Email</label>
                            <input class="form-control" name="order[order_email]" placeholder="Email *" type="text" value="<?php /*echo $userdata['signup_email'];*/?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="billing-form">
                            <label for="">Phone</label>
                            <input class="form-control" name="order[order_phone]" placeholder="Phone *" type="text">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="billing-form">
                            <label for="">Address</label>
                            <input class="form-control" name="order[order_address1]" placeholder="" value="<?php /*echo $userdata['signup_address'];*/?>" type="text">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="billing-form">
                            <label for="">City</label>
                            <input class="form-control" name="order[order_city]" placeholder="City *" type="text">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="billing-form">
                            <label for="">State</label>
                            <input class="form-control" name="order[order_state]" placeholder="State *" type="text">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="billing-form">
                            <label for="">Zip</label>
                            <input class="form-control" name="order[order_zip]" placeholder="Postcode / ZIP *" value="<?php /*echo $userdata['signup_zip'];*/?>" type="text">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="billing-form">
                            <label for="">Country</label>
                            <select name="order[order_country]" class="form-control" >
                                <?php
/*                                foreach ($country as $key=>$value):
                                    $name = $value['country'];
                                    */?>
                                    <option value="<?php /*echo $name;*/?>" <?php /*echo ($name=='UK')?'selected':''*/?> ><?php /*echo $name;*/?></option>
                                    <option value="<?php /*echo $name;*/?>" <?php /*echo (!empty($userdata['signup_country']))? ($userdata['signup_country']==$name)? 'selected': '' : ($name=='UK')?'selected':''*/?> ><?php /*echo $name;*/?></option>
                                <?php /*endforeach;*/?>
                            </select>
                        </div>
                    </div>
                </div>-->
                <!-- Billing address end -->

                <!--<div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group ship-checkbox">
                            <label class="checkbox-inline">
                                <input type="checkbox" value="" id="is_ship_items">
                                Ship Items To The Above Billing Address</label>
                        </div>
                    </div>
                </div>-->

                <!-- Shipping address start -->
                <!--<div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="billing-heading">
                            <h1>Shipping Address</h1>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="billing-form">
                            <label for="">First Name</label>
                            <input class="form-control" name="order[order_shipping_firstname]" placeholder="First Name *" type="text" value="<?php /*echo $userdata['signup_firstname'];*/?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="billing-form">
                            <label for="">Last Name</label>
                            <input class="form-control" name="order[order_shipping_lastname]" placeholder="Last Name *" type="text" value="<?php /*echo $userdata['signup_lastname'];*/?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="billing-form">
                            <label for="">Email</label>
                            <input class="form-control" name="order[order_shipping_email]" placeholder="Email *" type="text" value="<?php /*echo $userdata['signup_email'];*/?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="billing-form">
                            <label for="">Phone</label>
                            <input class="form-control" name="order[order_shipping_phone]" placeholder="Phone *" type="text">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="billing-form">
                            <label for="">Address</label>
                            <input class="form-control" name="order[order_shipping_address1]" placeholder="" value="<?php /*echo $userdata['signup_address'];*/?>" type="text">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="billing-form">
                            <label for="">City</label>
                            <input class="form-control" name="order[order_shipping_city]" placeholder="City *" type="text">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="billing-form">
                            <label for="">State</label>
                            <input class="form-control" name="order[order_shipping_state]" placeholder="State *" type="text">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="billing-form">
                            <label for="">Zip</label>
                            <input class="form-control" name="order[order_shipping_zip]" placeholder="Postcode / ZIP *" value="<?php /*echo $userdata['signup_zip'];*/?>" type="text">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="billing-form">
                            <label for="">Country</label>
                            <select name="order[order_shipping_country]" class="form-control" >
                                <?php
/*                                foreach ($country as $key=>$value):
                                    $name = $value['country'];
                                    */?>
                                    <option value="<?php /*echo $name;*/?>" <?php /*echo (!empty($userdata['signup_country']))? ($userdata['signup_country']==$name)? 'selected': '' : ($name=='UK')?'selected':''*/?> ><?php /*echo $name;*/?></option>
                                <?php /*endforeach;*/?>
                            </select>
                        </div>
                    </div>
                </div>-->

                <!-- Shipping address end -->


            </div>

        <!--</form>-->
    </div>
</section>

<script type="text/javascript">

    $(document).ready(function () {
        $("#btn-order").click(function (e) {

            var user_id = '<?php echo $this->userid?>';
            if(user_id < 1){
                AdminToastr.error('Please login to proceed','Error');
                return false;
            }

            e.preventDefault();
            Loader.show();
            setTimeout(function () {
                // Prevent form submit
                e.preventDefault();
                var obj = $("#submitStep2");
                // Get form data
                var data = obj.serialize();
                // Get post url
                var url = "<?=g('base_url');?>checkout/save-order";
                // Submit action
                var response = AjaxRequest.fire(url, data);
                if(response.status){
                    //location.reload();
                    window.location = response.url;
                    $('#submitStep2').trigger("reset");
                }
                // Add return
                return false;
            },1000);

            return false;
        });

        // Check ship items
        /*var is_check;
        $('#is_ship_items').click(function(){
            is_check = $(this).prop("checked");
            if(is_check == true){
                alert("Checkbox is checked.");
            }
            else if(is_check == false){
                alert("Checkbox is unchecked.");
            }
        });*/

    });

    /*$("#LoginSubmit").click(function(){
        var data = jQuery("#FormLogin").serialize();
        var url = "<?=g('base_url')?>account/do_login";
        var response = AjaxRequest.formrequest(url, data) ;


        if(response.status == 1)
        {
            AdminToastr.success(response.txt,'Success');
            window.location='<?=g('base_url')?>';
        }
        else
        {
            AdminToastr.error(response.txt,'Error');
        }
        return false;
    });*/

</script>