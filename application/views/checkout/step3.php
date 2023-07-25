<?
// Banner heading
$this->load->view('widgets/inner_banner');
// Banner section
?>

<!-- Breadcrumbs -->
<?php
//$data['breadcrumb_title'] = 'Payment';
//$this->load->view('widgets/breadcrumb',$data);
?>

<section class="billingSec">
    <div class="container">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <!--<div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="billing-heading">
                        <h1>Payment Process</h1>
                    </div>
                </div>
            </div>-->

            <!-- Billing address start -->
            <div class="row" id="payment-box">
                <?php
                // PayPal
                if($orderDetail['order_merchant']=='1'){?>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  text-center stripe-box">
                        <div class="billing-form">
                            <?php $this->load->view('widgets/payment/stripe_pro');?>
                        </div>
                    </div>
                <?php }
                // Stripe
                else{?>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  text-center paypal-box">
                        <div class="billing-form">
                            <?php $this->load->view('widgets/payment/paypal_pro');?>
                        </div>
                    </div>
                <?php }
                ?>
            </div>
            <!--<div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  text-center">
                    <div class="billing-form">
                        <?php /*$this->load->view('widgets/payment/stripe_pro');*/?>
                    </div>
                </div>
            </div>-->
            <!-- Billing address end -->



        </div>
    </div>
</section>
