<?php
//Get already set config variables from other files.
$config = $this->config;

$config['title'] = "Phase 3 Kicking Rankings";
$config['site_name'] = $config['title'];

//Set your own Configurations...
$config['site_assets_root'] = $config['base_url'] . "assets/";
$config['site_global_root'] = $config['site_assets_root'] . "global/";
$config['plugins_root'] = $config['site_global_root'] . "plugins/";
$config['site_global_images_root'] = $config['site_global_root'] . "images/";
$config['site_css_root'] = $config['site_assets_root'] . "css/";
$config['site_widgets_root'] = $config['site_assets_root'] . "widgets/";
$config['site_front_assets'] = $config['site_assets_root'] . "front_assets/";
$config['site_js_root'] = $config['site_assets_root'] . "js/";
$config['site_images_root'] = $config['site_assets_root'] . "images/";
$config['site_categories_images_root'] = $config['site_images_root'] . "categories/";
$config['site_brochures_root'] = $config['site_assets_root'] . "images/brochures/";


$config['ci_paginate'] = array();
$config['ci_paginate']['uri'] = "paginate";
$config['ci_paginate']['update_status_uri'] = "update_status";

// Store the Configuration from ABove for use in JS_CONFIG
$config['js_config'] = $config;

//Upload Roots
$config['site_upload_img_root'] = "assets/images/";

//Excel files uploads Root

//Maker Logos uploads  
$config['site_upload_default'] = "assets/uploads/";
$config['site_upload_brand'] = $config['site_upload_default']."brand/";
$config['site_upload_logo'] = $config['site_upload_default']."logo/";
$config['site_upload_category'] = $config['site_upload_default']."category/";
$config['site_upload_product'] = $config['site_upload_default']."product/";
$config['site_upload_season'] = $config['site_upload_default']."season/";
$config['site_upload_catalog'] = $config['site_upload_default']."catalog/";
$config['site_upload_client'] = $config['site_upload_default']."client/";
$config['site_upload_company'] = $config['site_upload_default']."company/";
$config['site_upload_portfolio'] = $config['site_upload_default']."portfolio/";
$config['site_upload_astronomy'] = $config['site_upload_default']."astronomy/";
$config['site_upload_telescap_technology'] = $config['site_upload_default']."telescap-technology/";
// Carousel banner folder path
$config['site_upload_banner'] = $config['site_upload_default']."banner/";
$config['site_upload_gallery'] = $config['site_upload_default']."gallery/";
$config['site_upload_cms_image'] = $config['site_upload_default']."cms/";
$config['site_upload_services'] = $config['site_upload_default']."services/";
$config['site_upload_signup'] = $config['site_upload_default']."user/";
$config['site_upload_resume'] = $config['site_upload_default']."resume/";
$config['site_upload_csv'] = $config['site_upload_default']."csv/";
$config['site_upload_supplier'] = $config['site_upload_default'] . "supplier/";
$config['site_upload_feature'] = $config['site_upload_default'] . "feature/";
$config['album_upload_image'] = $config['site_upload_default'] . "album/";
$config['excel_upload'] = $config['site_upload_default'] . "excel/";
//PHPExcel External Class
$config['PHPExcel_Path'] = $config['base_url']."assets/admin/PHPExcel/";

//Site LINKS
$config['site_portfolio'] = $config['base_url'] . "portfolio";

//Email Addresses.

//URL MASKS Configs
$config['_urls'] = array(
		'category_detail' => $config['base_url']."category/%s" ,
		'product_list' => $config['base_url']."product/list/%s" ,
		'product_detail' => $config['base_url']."product/%s" ,
);

$config[ 'carriers' ] = array( 1=> "Free Shipping" , 2 => "Pick From Store" , 3 => "Cash on Delivery"  ) ;

$config['currency'] = "$" ;
$config['currency_rate'] = "1.00" ;

// Default System Order Statuses
$config['order_status'] = array(
							'placed' => 1 ,
							'admin_placed' => 7 ,
							'transfer_detail_added' => 4 ,
							'twoco_authorized' => 5 ,
						  );


// TIMEZONE FOR DB - LEAVE EMPTY STRING IF NOT REQUIRED
if(ENVIRONMENT == 'development')
{
    define("MYSQL_TIME_ZONE" , "+5:00");
    define('UPS_LICENCE_NUM','');
    define('UPS_USER_ID','');
    define('UPS_USER_PASS','');
    define('UPS_USER_CODE','');
    define('UPS_USER_SHIP_NUM','');
    define('PAYPAL_URL','https://www.sandbox.paypal.com/cgi-bin/webscr');
    define('PAYEEZY_URL','https://demo.globalgatewaye4.firstdata.com/payment');
    define('PAYEEZY_ID','');
    define('PAYEEZY_TRANSACTION_ID','');
    define("PAYPAL_GATEWAY_URL" , "https://sandbox.paypal.com/cgi-bin/webscr" ) ;
    define("PHP_TIME_ZONE" , "Asia/Karachi");
    define("UPLOADCARE_PUB_KEY" , "");
    define("UPLOADCARE_URL" , "https://upload.uploadcare.com/base/");
    define("PAYPAL_ENV" , "sandbox");
    define("PAYPAL_CLIENT_ID" , "AUmHB_5SuVcp75BKtDpmELANcg1XmEvFG8SvvuYQa-cngWOXSSmRfXBnt15_TGkcJtpsnFjMBzpxzE6F");
    // CLIENT TEST ID
    define("STRIPE_PUBLIC_KEY" , "pk_test_hWqb9XMOfZFuscYRUOHPNIyg");
    define("STRIPE_SECRET_KEY" , "sk_test_f0U9q9AlzwHPojYgvsV96QuW");
    // HYPER PAY CREDENTIALS
    define('HYPER_PAY_BASE_URL','https://test.oppwa.com');
    define('HYPER_PAY_URL','https://test.oppwa.com/v1/checkouts');
    define('HYPER_PAY_ENTITY_ID','8a8294174d0595bb014d05d82e5b01d2');
    define('HYPER_PAY_ACCESS_TOKEN','OGE4Mjk0MTc0ZDA1OTViYjAxNGQwNWQ4MjllNzAxZDF8OVRuSlBjMm45aA');
    define('HYPER_PAY_HTML_JS','https://test.oppwa.com/v1/paymentWidgets.js');
    // PAYTAB CREDENTIALS
    define("PAYTAB_MERCHANT" , "10064547");
    define("PAYTAB_SEC_KEY" , "ru8wVYgZBSv8iTvWB5amAjOvooeoZDCr8KX3Jd3k6ytorYl34vpFOeadCpCC3e3bZ1fIei3lQwKiv5mABMfq0qDCPgeSvh4ujjdy");
}

elseif(ENVIRONMENT == 'testing')
{
    define("MYSQL_TIME_ZONE" , "+5:00");
    define('UPS_LICENCE_NUM','');
    define('UPS_USER_ID','');
    define('UPS_USER_PASS','');
    define('UPS_USER_CODE','');
    define('UPS_USER_SHIP_NUM','');
    define('PAYPAL_URL','https://www.sandbox.paypal.com/cgi-bin/webscr');
    define('PAYEEZY_URL','https://demo.globalgatewaye4.firstdata.com/payment');
    define('PAYEEZY_ID','');
    define('PAYEEZY_TRANSACTION_ID','');
    define("PAYPAL_GATEWAY_URL" , "https://sandbox.paypal.com/cgi-bin/webscr" ) ;
    define("PHP_TIME_ZONE" , "US/Eastern");
    define("UPLOADCARE_PUB_KEY" , "");
    define("UPLOADCARE_URL" , "https://upload.uploadcare.com/base/");
    define("PAYPAL_ENV" , "sandbox");
    define("PAYPAL_CLIENT_ID" , "AUmHB_5SuVcp75BKtDpmELANcg1XmEvFG8SvvuYQa-cngWOXSSmRfXBnt15_TGkcJtpsnFjMBzpxzE6F");
    // CLIENT TEST ID
    define("STRIPE_PUBLIC_KEY" , "pk_test_hWqb9XMOfZFuscYRUOHPNIyg");
    define("STRIPE_SECRET_KEY" , "sk_test_f0U9q9AlzwHPojYgvsV96QuW");
    // HYPER PAY CREDENTIALS
    define('HYPER_PAY_BASE_URL','https://test.oppwa.com');
    define('HYPER_PAY_URL','https://test.oppwa.com/v1/checkouts');
    define('HYPER_PAY_ENTITY_ID','8a8294174d0595bb014d05d82e5b01d2');
    define('HYPER_PAY_ACCESS_TOKEN','OGE4Mjk0MTc0ZDA1OTViYjAxNGQwNWQ4MjllNzAxZDF8OVRuSlBjMm45aA');
    define('HYPER_PAY_HTML_JS','https://test.oppwa.com/v1/paymentWidgets.js');
    // PAYTAB CREDENTIALS
    define("PAYTAB_MERCHANT" , "10064547");
    define("PAYTAB_SEC_KEY" , "ru8wVYgZBSv8iTvWB5amAjOvooeoZDCr8KX3Jd3k6ytorYl34vpFOeadCpCC3e3bZ1fIei3lQwKiv5mABMfq0qDCPgeSvh4ujjdy");
}

else
{
    define("MYSQL_TIME_ZONE" , "-5:00");
    define('UPS_LICENCE_NUM','');
    define('UPS_USER_ID','');
    define('UPS_USER_PASS','');
    define('UPS_USER_CODE','');
    define('UPS_USER_SHIP_NUM','');
    define('PAYPAL_URL','https://www.paypal.com/cgi-bin/webscr');
    define('PAYEEZY_URL','https://checkout.globalgatewaye4.firstdata.com/payment');
    define('PAYEEZY_ID','');
    define('PAYEEZY_TRANSACTION_ID','');
    define("PAYPAL_GATEWAY_URL" , "https://www.paypal.com/cgi-bin/webscr" ) ;
    define("PHP_TIME_ZONE" , "US/Eastern");
    define("UPLOADCARE_PUB_KEY" , "");
    define("UPLOADCARE_URL" , "https://upload.uploadcare.com/base/");
    define("PAYPAL_ENV" , "production");
    define("PAYPAL_CLIENT_ID" , "");
    // CLIENT TEST ID
    define("STRIPE_PUBLIC_KEY" , "");
    define("STRIPE_SECRET_KEY" , "");
    // HYPER PAY CREDENTIALS
    define('HYPER_PAY_BASE_URL','https://oppwa.com');
    define('HYPER_PAY_URL','https://oppwa.com/v1/checkouts');
    define('HYPER_PAY_ENTITY_ID','');
    define('HYPER_PAY_ACCESS_TOKEN','');
    define('HYPER_PAY_HTML_JS','https://oppwa.com/v1/paymentWidgets.js');
    // PAYTAB CREDENTIALS
    define("PAYTAB_MERCHANT" , "");
    define("PAYTAB_SEC_KEY" , "");
}

// YOUTUBE URLs MASK
define("YOUTUBE_IMG_MASK" , "http://img.youtube.com/vi/%s/mqdefault.jpg");
define("YOUTUBE_EMBED_MASK" , "http://www.youtube.com/embed/%s");
// CONSTANTS 

//Will be set from DB now.
//define("MAX_LEVEL" , 30);
//define("MAX_XP" , 100);

define("ACCESS_PUBLIC" , 1);
define("ACCESS_PRIVATE" , 2);

define("PERSISTANCE_PERMANENT" , 1);
define("PERSISTANCE_TEMPORARY" , 2);

define("TYPE_TOURNAMENT" , 1);
define("TYPE_PLAYOFFS" , 2);

define("INVITE_SENT" , 1);
define("INVITE_ACCEPTED" , 2);
define("INVITE_DENIED" , 0);

define("STATUS_ACTIVE" , 1);
define("STATUS_INACTIVE" , 0);
// Team forfeit.
define("YES" , 1);
define("NO" , 0);
// Team forfeit.
define("STATUS_DELETE" , 2);

// ORDER CONFIGS 
define("ORDER_NO_MASK" , "RZ-INV-%07d");

// PAYPAL CONFIGS
define("PAYMENT_ORDER_CANCEL_STATUS" , '2');
define("PAYMENT_ORDER_CANCEL_REASON" , 'Transaction Cancelled by User');

define("PAYMENT_ORDER_SUCCESS_STATUS" , '1');
define("PAYMENT_ORDER_SUCCESS_REASON" , 'Payment Successfully Transfered');

define("PAYMENT_ORDER_GIFT_STATUS" , '1');
define("PAYMENT_ORDER_GIFT_REASON" , 'Credits Gift By Admin');

define("PAYMENT_ORDER_ADMIN_REFUND_STATUS" , '8');
define("PAYMENT_ORDER_ADMIN_REFUND_REASON" , 'Reversed/Refunded by Admin');

define("PAYMENT_ORDER_COMPLETE_STATUS" , '3');
define("PAYMENT_ORDER_COMPLETE_REASON" , 'Transaction complete - Redirected from Payment Gateway');

define("PAYMENT_ORDER_PENDING_STATUS" , '0');
define("PAYMENT_ORDER_PENDING_REASON" , 'Transaction pending. User not yet visited Payment Gateway');
	
define("CONFIG_ADMIN" , 'admin' ) ;
define("CONFIG_SYSTEM" , 'system' ) ;

// SOCIAL MEDIA CONFIG ""
define("FB_APP_ID" , "");
define("FB_APP_SECRET" , "");


//GOOGLE Captcha credential (General Captcha)
define("GOOGLE_CAPTCHA_SITE_KEY" , "6LfwGCgpAAAAANyO4pZE12AMb9zaA1DcW7AQ1KKO");
define("GOOGLE_CAPTCHA_SECRET_KEY" , "6LfwGCgpAAAAAA9ONfZfBH6gVdLAYLtrRF1ByX1b");


// 2CO Two Checkout Configs
define('TWO_CO_PUB_KEY', '') ;
define('TWO_CO_PRIVATE_KEY', '') ;
define('TWO_CO_SELLER_ID', "" ) ;
define('TWO_CO_ENVIRONMENT', 'sandbox') ;
define('TWO_CO_SSL', false ) ;

define('VENDOR', 1 ) ;
define('ADMIN', 1 ) ;
define('CONTACTUS_EMAIL', 'email_conatct_us' ) ;
define('CONTACTUS_SKYPE', 'skype_id' ) ;
define('CONTACTUS_FACEBOOK', 'facebook_id' ) ;
define('CONTACTUS_TWITTER', 'twitter_id' ) ;

$config['appId']   = '437437646454367';
$config['secret']  = '1564932dd4a202a9dc8801ebf1e8f5f3';

// Google Map API
define("GOOGLE_MAP_API","AIzaSyCHF3gvFxOlMLRsPGoBSKTlpRQhJy9l3zY");
define("RADIUS",10);
?>