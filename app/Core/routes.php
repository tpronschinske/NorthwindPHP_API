<?php
/**
 * Routes - all standard routes are defined here.
 *
 * @author Cooney Creative - info@cooneycreative.us
 *
 * @version 1.0
 * @date updated March 12, 2019
 */

/** Create alias for Router. */
use Core\Router;
use Helpers\Hooks;

/* Define routes. */
Router::any('', 'Controllers\HomeController@index');
Router::any('login', 'Controllers\AuthController@login');
Router::any('reset', 'Controllers\AuthController@resetEmail');
Router::any('pass/(:any)', 'Controllers\AuthController@reset');
Router::any('logout', 'Controllers\AuthController@logout');

Router::any('/customer', 'Controllers\CustomerController@getCustomers');
Router::any('/customer/list', 'Controllers\CustomerController@getCustomerList');
Router::any('/customer/(:any)', 'Controllers\CustomerController@getCustomerById');

Router::any('/order', 'Controllers\OrderController@getOrders');
Router::any('/order/(:any)', 'Controllers\OrderController@getOrderById');
Router::any('/order/details/(:any)', 'Controllers\OrderController@getOrderDetailsById');

Router::any('/category', 'Controllers\CategoryController@getCategories');
Router::any('/category/(:any)', 'Controllers\CategoryController@getCategoryById');

Router::any('/product', 'Controllers\ProductController@getProducts');
Router::any('/product/(:any)', 'Controllers\ProductController@getProductById');

/* Module routes. */
$hooks = Hooks::get();
$hooks->run('routes');

/* If no route found. */
Router::error('Core\Error@index');

/* Turn on old style routing. */
Router::$fallback = false;

/* Execute matched routes. */
Router::dispatch();
