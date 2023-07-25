<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = "home";

//admin
$route['admin'] = "admin";
$route['admin/(:any)'] = "admin/$1";

$route['media-type/(:any)'] = "media_type/detail/$1";



// Service
$route['search']="search/index";
$route['service-details/(:any)'] = "services/details/$1";

$route['news-and-event-details/(:any)'] = "home/detail/$1";

$route['blog/save_comment'] = "blog/save_comment";
$route['blog/(:any)'] = "blog/detail/$1";

// Product
$route['product/page'] = 'product/index';
$route['product/page/(:any)'] = 'product/index/$1';

// Promotion
$route['promotion/page'] = 'promotion/index';
$route['promotion/page/(:any)'] = 'promotion/index/$1';


$route['kicker/detail'] = 'kicker/detail';
$route['campresults'] = 'camp_result';
$route['campconcept'] = 'about_us';
$route['punterrankings'] = 'punter';
$route['upcomingcamps'] = 'camp';
$route['evaluationteam'] = 'team';
$route['snapperrankings'] = 'snapper';
$route['fieldgoalkickerrankings'] = 'field_goal';
$route['kickoffkickerrankings'] = 'kicker';

$route['media'] = 'blog';
$route['contactus'] = 'contact_us';

// Category
/*$route['category/(:any)'] = 'product/category/$1';
$route['category/(:any)/page'] = 'product/category/$1';
$route['category/(:any)/page/(:any)'] = 'product/category/$1/page/$2';*/

// Search
$route['product/search'] = 'product/search';
$route['product/search/(:any)'] = 'product/search/$1';

// Accessories
$route['accessories/page'] = 'accessories/index';
$route['accessories/page/(:any)'] = 'accessories/index/$1';
$route['merchandise/page'] = 'merchandise/index';
$route['merchandise/page/(:any)'] = 'merchandise/index/$1';
$route['shop/page'] = 'shop/index';
$route['shop/page/(:any)'] = 'shop/index/$1';
$route['season/page'] = 'season/index';
$route['season/page/(:any)'] = 'season/index/$1';

// Blog Category
$route['blog-category/(:any)'] = 'blog_category/index/$1';

// Blog Category
$route['service/detail/(:any)'] = 'services/detail/$1';

// MISC
$route['shipping-and-return'] = "yeastech/shipping_and_return";
$route['molecular-biology'] = "yeastech/molecular_biology";
$route['protocol'] = "yeastech/protocol";
$route['yeastech-101'] = "yeastech/yeastech_101";

$route['pharmacy-technician'] = "pharmacy/pharmacy_technician";
$route['pharmacy-school-courses'] = "pharmacy/pharmacy_school_course";

$route['nursing-calculations'] = "nursing/nursing_calculations";

// Naplex
$route['naplex-biostatistics'] = "naplex/naplex_biostatistics";
$route['naplex-poster'] = "naplex/naplex_poster";
$route['naplex-printed-book'] = "naplex/naplex_printed_book";
$route['naplex-test-bank'] = "naplex/naplex_test_bank";
$route['naplex-pharmaceutical-calculation'] = "naplex/naplex_pharmaceutical_calculation";

// FPGEE
$route['fpgee-biostatistics'] = "fpgee/fpgee_biostatistics";
$route['fpgee-pharmaceutical-calculations'] = "fpgee/fpgee_pharmaceutical_calculations";

// Pharmacy
$route['pharmacy-technician-pharmaceutical-calculations'] = "pharmacy/pharmacy_technician_pharmaceutical_calculations";


$route['translate_uri_dashes'] = true;


//$route['detail/(:any)'] = "Adshare/detail/$1";