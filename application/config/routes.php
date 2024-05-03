<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
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

// FRONTEND
$route['default_controller'] = 'Home';

//USER PANEL


// ADMIN PANEL
$route['dcadmin'] = 'login/admin_login';
$route['dcadmin/(:any)'] = 'f9admin/$1';
$route['dcadmin/(:any)/(:any)'] = 'f9admin/$1/$2';
$route['dcadmin/(:any)/(:any)/(:any)'] = 'f9admin/$1/$2/$3';
$route['dcadmin/(:any)/(:any)/(:any)/(:any)'] = 'f9admin/$1/$2/$3/$4';
$route['dcadmin/(:any)/(:any)/(:any)/(:any)/(:any)'] = 'f9admin/$1/$2/$3/$5';


$route['404_override'] = 'Home/error404';
$route['about_us'] = 'Home/about_us';
$route['career'] = 'Home/career';
$route['privacy_policy'] = 'Home/privacy_policy';
$route['return_and_replace'] = 'Home/return_and_replace';
$route['shipping_and_delivery'] = 'Home/shipping_and_delivery';
$route['terms_and_conditions'] = 'Home/terms_and_conditions';
$route['contact'] = 'Home/contact';
$route['reseller_register'] = 'Home/reseller_register';
$route['my_profile'] = 'Home/my_profile';
$route['my_profile/(:any)'] = 'Home/my_profile/$1';
$route['add_address'] = 'Home/add_address';
$route['edit_address/(:any)'] = 'Home/edit_address/$1';
$route['my_wishlist'] = 'Home/my_wishlist';
$route['my_bag'] = 'Home/my_bag';
$route['blogs'] = 'Home/all_blogs';
$route['blog'] = 'Home/blog_details';
$route['products/(:any)/(:any)'] = 'Home/all_products/$1/$2';
$route['products/(:any)/(:any)/(:any)'] = 'Home/all_products/$1/$2/$3';
$route['product_detail/(:any)'] = 'Home/product_detail/$1';
$route['filter_products'] = 'Home/apply_filter';
$route['view_checkout'] = 'Order/view_checkout';
$route['order_success'] = 'Order/order_success';
$route['find'] = 'Home/search';


$route['translate_uri_dashes'] = FALSE;
