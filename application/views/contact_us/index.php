<!-- Banner Row  Ends-->
<?
$phone2 = g('db.admin.phone');
$phonenum2 = str_replace(array(')', '(', '-', ' '), array('', '', '', ''), $phone2);
$address = g('db.admin.company_address_1');
$info_email = g('db.admin.email');
$support_email = g('db.admin.support_email');
?>
<!-- Inpage-->

<?php //$this->load->view('widgets/inner_banner');
?>

<!-- <div class="contact-sec">
    <div class="container">

        <div class="row">

            <div class="col-md-6">
                <div class="cntc-info">
                    <h4>Contact Us</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="inn-info">
                                <h5>Address</h5>
                                <ul>
                                    <li><?php echo $address; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="inn-info">
                                <h5>Email Address</h5>
                                <ul>
                                    <li><a href="mailto:<?php echo $info_email; ?>"><?php echo $info_email; ?></a></li>
                                    <li><a href="mailto:<?php echo $support_email; ?>"><?php echo $support_email; ?></a></li>
                                    
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="inn-info">
                                <h5>Phone Number</h5>
                                <ul>
                                    <li><a href="tel:<?php echo $phone2; ?>"><?php echo $phone2; ?></a></li>
                                    <li><a href="tel:<?php echo $phonenum2; ?>"><?php echo $phonenum2; ?></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="inn-info">
                                <h5>Website Address</h5>
                                <ul>
                                    <li><a href="<?php echo g('base_url'); ?>"><?php echo g('db.admin.domain'); ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-6">
                <div class="cntc-form">
                    <form class="contact-form" id="contact-form" action="<?= g('base_url') ?>contact-us/store" method="post">
                            <div class="col-md-12"><label>Name*</label><input type="text" name="inquiry[inquiry_fullname]" placeholder=""></div>
                            <div class="col-md-12"><label>Email ID*</label><input type="email" name="inquiry[inquiry_email]" placeholder=""></div>
                            <div class="col-md-12"><label>Subject*</label><input type="text" name="inquiry[inquiry_subject]" placeholder=""></div>
                            <div class="col-md-12"><label>Message</label><textarea placeholder="" name="inquiry[inquiry_comments]"></textarea></div>
                            <div class="col-md-12"><label>Captcha</label><?php $this->load->view('widgets/google_captcha'); ?><br></div>
                            <div class="col-md-12"><button class="btn-send">Submit</button></div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
-->


<div class="container-fluid">
    <div class="row">

        <div class="col-md-12 mt-5">
            <span class="heading">
                <?= $banner['banner_heading'] ?>
            </span>
        </div>

        <div class="col-md-12 mt-2 homeDesc">
            <?= html_entity_decode($banner['banner_description']) ?>
        </div>
    </div>
</div>
</div>

<div class="col-lg-12">
    <div class="row mt-5">
        <!-- <div class="col-md-12 sbhfirst text-center">
        <h2>Contact Us</h2>
    </div> -->
    </div>
</div>
<div class="container-fluid contact-us">
    <div class="row">
        <div class="col-md-4">
            <div class="uper">
                <p>Northern Region</p>
                <p><?= g('db.admin.company_address_1') ?></p>
                <p><a href="tel:<?= g('db.admin.phone') ?>"><?= g('db.admin.phone') ?></a></p>
            </div>
            <div class="lower">
                <p>Southern Region</p>
                <p><?= g('db.admin.company_address_2') ?></p>
                <p><a href="tel:<?= g('db.admin.phone_2') ?>"><?= g('db.admin.phone_2') ?></a></p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="uper">
                <p>Media Requests</p>
                <p><a href="mailto:<?= g('db.admin.email') ?>"><?= g('db.admin.email') ?> </a></p>
                <hr style="background:white;width: 51%;">
                <p>Staff Email</p>
                <p><a href="mailto:<?= g('db.admin.staff_email') ?>"><?= g('db.admin.staff_email') ?> </a></p>
            </div>
            <div class="lower">
                <p>Website/Profile Updates</p>
                <p><a href="mailto:<?= g('db.admin.support_email') ?>"><?= g('db.admin.support_email') ?> </a></p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="uper">
                <h3 style="color: #fff">Central Office</h3>
                <a href="https://goo.gl/maps/t58mVowvgsJMM8b26" target="_blank" style="color: #fff"><?= g('db.admin.central_office') ?></a>
            </div>
            <div class="lower">
                <p>Follow our journey and camp updates!</p>
                <div class="socil-icon cnt-icon" style="justify-content: flex-start;">
                    <a href="<?= g('db.admin.facebook') ?>" target="_blank">
                        <img src="<?= g('images_root') ?>facebook.svg" alt="">
                    </a>
                    <a href="<?= g('db.admin.youtube') ?>" target="_blank">
                        <img src="<?= g('images_root') ?>youtube.svg" alt="">
                    </a>
                    <a href="<?= g('db.admin.instagram') ?>" target="_blank">
                        <img src="<?= g('images_root') ?>insta.svg" alt="">
                    </a>
                    <a href="<?= g('db.admin.twitter') ?>" target="_blank">
                        <img src="<?= g('images_root') ?>twitter.svg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="row" style="margin-top: 6%;">
        <div class="col-md-4">
            <p>Southern Region</p>
            <p><?= g('db.admin.company_address_2') ?></p>
            <p><a href="tel:<?= g('db.admin.phone_2') ?>"><?= g('db.admin.phone_2') ?></a></p>
        </div>
        <div class="col-md-4">
            <p>Website/Profile Updates</p>
            <p><a href="mailto:<?= g('db.admin.support_email') ?>"><?= g('db.admin.support_email') ?> </a></p>
        </div>
        <div class="col-md-4">
            <p>Follow our journey and camp updates!</p>
            <div class="socil-icon cnt-icon">
                <a href="<?= g('db.admin.facebook') ?>" target="_blank">
                    <img src="<?= g('images_root') ?>facebook.svg" alt="">
                </a>
                <a href="<?= g('db.admin.youtube') ?>" target="_blank">
                    <img src="<?= g('images_root') ?>youtube.svg" alt="">
                </a>
                <a href="<?= g('db.admin.instagram') ?>" target="_blank">
                    <img src="<?= g('images_root') ?>insta.svg" alt="">
                </a>
                <a href="<?= g('db.admin.twitter') ?>" target="_blank">
                    <img src="<?= g('images_root') ?>twitter.svg" alt="">
                </a>
            </div>
        </div>
    </div> -->




</div>



<script>
    /**************************************************************\
            Include Affirm.js Snippet
\**************************************************************/
    var _affirm_config = {
        public_api_key: "1RNZONP2SEMQ4WPQ",
        /* replace with public api key */
        script: "https://cdn1.affirm.com/js/v2/affirm.js"
    };
    (function(l, g, m, e, a, f, b) {
        var d, c = l[m] || {},
            h = document.createElement(f),
            n = document.getElementsByTagName(f)[0],
            k = function(a, b, c) {
                return function() {
                    a[b]._.push([c, arguments])
                }
            };
        c[e] = k(c, e, "set");
        d = c[e];
        c[a] = {};
        c[a]._ = [];
        d._ = [];
        c[a][b] = k(c, a, b);
        a = 0;
        for (b = "set add save post open empty reset on off trigger ready setProduct".split(" "); a < b.length; a++) d[b[a]] = k(c, e, b[a]);
        a = 0;
        for (b = ["get", "token", "url", "items"]; a < b.length; a++) d[b[a]] = function() {};
        h.async = !0;
        h.src = g[f];
        n.parentNode.insertBefore(h, n);
        delete g[f];
        d(g);
        l[m] = c
    })(window, _affirm_config, "affirm", "checkout", "ui", "script", "ready");

    var checkout_mode = "modal";

    var rad = document.checkout_mode_select.checkout_mode;
    var prev = null;
    for (var i = 0; i < rad.length; i++) {
        rad[i].onclick = function() {
            console.log(this.value);
            checkout_mode = this.value;
        };
    }


    /**************************************************************\
              Set Affirm Checkout Values
    \**************************************************************/




    /**************************************************************\
                  Handle the form submission
    \**************************************************************/
    $("#submit-form").click(function() {
        affirm.checkout({

            "config": {
                "financial_product_key": "25A9CLVPU6IQ171S", //replace with your Affirm financial product key
            },

            "merchant": {
                "user_cancel_url": "https://google.com",
                "user_confirmation_url": "https://google.com",
                "user_confirmation_url_action": "POST"
            },

            "metadata": {
                "mode": checkout_mode
            },

            //shipping contact
            "shipping": {
                "name": {
                    "first": "John",
                    "last": "Doe"
                    // You can also include the full name
                    // "full" : "John Doe"
                },
                "address": {
                    "line1": "225 Bush Street",
                    "line2": "Floor 16",
                    "city": "San Francisco",
                    "state": "CA",
                    "zipcode": "94104"
                },
                "email": "joe.doe@email.com",
                "phone_number": "4155555555"
            },

            // cart 
            "items": [{
                "display_name": "Acme SLR-NG",
                "sku": "ACME-SLR-NG-01",
                "unit_price": 200 * 100,
                "qty": 1,
                "item_image_url": "https://examplemerchant.com/static/item.png",
                "item_url": "https://examplemerchant.com/acme-slr-ng-01.htm",
            }],

            // pricing / charge amount
            "currency": "USD",
            "discounts": {
                "savemoney123": {
                    "discount_amount": 0
                }
            },
            "tax_amount": 0,
            "shipping_amount": 0,
            "total": 200 * 100
        });
        console.log(checkout_mode);
        affirm.checkout.open({
            onFail: function(a) {
                console.log(a)
            },
            onSuccess: function(a) {
                console.log(a)
            }
        });
        //    affirm.checkout.open();
    });
</script>