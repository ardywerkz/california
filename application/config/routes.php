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
$route['default_controller'] = 'home';
$route['adminlogin'] = 'admin/auth';
$route['logout'] = 'admin/auth/logout';

/*=======================================
Frontend
========================================*/
//login
$route['login'] = 'account/login/';

//footer
$route['privacy-policy'] = 'about/privacy/';
$route['terms-use'] = 'about/termsUse/';
$route['careers'] = 'about/careers/';


//cart
$route['add-to-cart'] = 'CartController/addCart';
$route['view-cart'] = 'CartController/viewCart';
$route['checkout'] = 'CartController/checkOut';
$route['place-order'] = 'CartController/addOrder';
$route['cart/update'] = 'CartController/updateCart';
$route['cart/delete'] = 'CartController/deleteCart';
$route['cart/history'] = 'CartController/checkOut_history';
$route['profile'] = 'CartController/myAccount';
$route['profile/update'] = 'CartController/updateProfile';
//menu
$route['contact-us'] = 'contact/index';
$route['about-us'] = 'about/index';
/*=======================================
Backend
========================================*/
//seeder
$route['seedUsers'] = 'admin/users/seed_account';

//contact
$route['contact'] = 'admin/contact/index';

//dashboard
$route['dashboard'] = 'admin/dashboard/index';
//Users
$route['users'] = 'admin/users/index';
$route['users/admin'] = 'admin/users/adminList';
$route['add_admin'] = 'admin/users/add_admin';
$route['update_password'] = 'admin/users/updatePassword';
$route['delete_admin'] = 'admin/users/deleteAdmin';
$route['deleteUser'] = 'admin/users/deleteUsers';



//category
$route['category'] = 'admin/category/index';
$route['add_category'] = 'admin/category/addCategory';
$route['update_category'] = 'admin/category/updateCategory';
$route['delete_category'] = 'admin/category/deleteCategory';

//product
$route['product'] = 'admin/product/index';
$route['product/add'] = 'admin/product/addProduct';
$route['product/delete'] = 'admin/product/deleteProduct';
$route['product/update/details'] = 'admin/product/updateDetails';
$route['product/saveImage'] = 'admin/product/save_productImage';

//order
$route['order'] = 'admin/order/index';

//setting
$route['setting'] = 'admin/setting/index';
$route['saveSlider'] = 'admin/setting/save_edit';
$route['setting/selling'] = 'admin/setting/selling';
$route['setting/add_selling'] = 'admin/setting/addSelling';
$route['setting/saveSelling'] = 'admin/setting/save_edit_selling';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
