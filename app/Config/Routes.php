<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'client\ctlClient::index');
// $routes->get('/product', 'client\mainProducts::productList');
// $routes->get('/product/(:num)', 'client\mainProducts::productList/$1');

$routes->get('/product', 'client\ctlClient::productList');
$routes->get('/productdetail/(:num)', 'client\ctlClient::productDetail/$1');
$routes->post('/act_AddReview', 'client\ctlClient::act_AddReview');
$routes->post('/act_updateReview','client\ctlClient::act_updateReview');



$routes->get('/addToCart/(:num)', 'client\ctlClient::addToCart/$1');
$routes->post('/addOneToCart', 'client\ctlClient::addOneToCart');
$routes->post('/updateCart', 'client\ctlClient::updateCart');
$routes->get('/deleteCart/(:num)', 'client\ctlClient::deleteCart/$1');
$routes->get('/cart', 'client\ctlClient::cart');

$routes->get('/checkout', 'client\ctlClient::AddOrder');

$routes->get('/about','client\ctlClient::about');
$routes->get('/contact','client\ctlClient::contact');

$routes->post('/act_SendContact','client\ctlClient::act_SendContact');

$routes->get('/login', 'Home::login');
//$routes->get('/act_login', 'Home::act_login');
$routes->post('/login_action', 'Home::login_action');

$routes->get('/signup', 'Home::signUp');
$routes->post('/signUp_action', 'Home::signUp_action');

$routes->get('/customerInfor','client\ctlClient::customerInfor');
$routes->post('/act_updateCustomer','client\ctlClient::act_updateCustomer');
$routes->get('/logout', 'Home::logout');

// $routes->get('/admin/user', 'admin\User::index');
// $routes->get('/admin/user/list', 'admin\User::listUser');

//$routes->get('/admin/user/add/(:any)', 'admin\User::add/$1');
//$routes->get('/admin/user/add', 'admin\User::add');
//$routes->post('/admin/user/act_add', 'admin\User::act_add');


//-- ADMIN
// -- Product
$routes->get('/admin', 'Home::index');
$routes->get('/admin/product/list', 'admin\Product::listProduct');
$routes->get('/admin/category/list', 'admin\Category::listCategory');
$routes->get('/admin/user/list', 'admin\User::listUser');
$routes->get('/admin/order/list', 'admin\Order::listOrder');
$routes->get('/admin/contact/list', 'admin\Contact::listContact');
$routes->get('/admin/user/updateAdminProfile', 'admin\User::updateAdminProfile');
$routes->get('/admin/product/add', 'admin\Product::add');
//$routes->post('/admin/product/act_update', 'admin\product::act_update');

//$routes->get('/admin/product/delete/(:num)', 'admin\Product::delete');
//$routes->post('/admin/product/act_add', 'admin\product::act_add');


$routes->get('/admin/category/add', 'admin\category::add');

$routes->post('/admin/order/act_update/(:any)', 'admin\Order::act_update/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
