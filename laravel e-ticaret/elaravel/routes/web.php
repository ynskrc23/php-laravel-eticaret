<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Fronted route
Route::get('/','HomeController@index');


//Show category product route
Route::get('/product_by_category/{category_id}','HomeController@show_product_by_category');
Route::get('/product_by_manufacture/{manufacture_id}','HomeController@show_product_by_manufacture');
Route::get('/view_product/{product_id}','HomeController@product_details_by_id');


//Cart route
Route::post('/add-to-cart','CartController@add_to_cart');
Route::get('/show-cart','CartController@show_cart');
Route::get('/delete-cart/{rowId}','CartController@delete_to_cart');
Route::post('/update-cart','CartController@update_to_cart');


//Checkout route
Route::get('/login-check','CheckoutController@login_check');
Route::post('/customer-save','CheckoutController@customer_save');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/shopping-save','CheckoutController@shopping_save');
Route::post('/customer-login','CheckoutController@customer_login');
Route::get('/customer-logout','CheckoutController@customer_logout');
Route::get('/payment','CheckoutController@payment');
Route::post('/payment-save','CheckoutController@payment_save');


//Backend route
Route::get('/logout','SuperAdminController@logout');
Route::get('/admin','AdminController@index');
Route::get('/dashboard','SuperAdminController@index');
Route::post('/admin-dashboard','AdminController@dashboard');


//Category route
Route::get('/category-all','CategoryController@category_all');
Route::get('/category-add','CategoryController@index');
Route::post('/save-category','CategoryController@save_category');
Route::get('/edit-category/{category_id}','CategoryController@edit_category');
Route::post('/update-category/{category_id}','CategoryController@update_category');
Route::get('/delete-category/{category_id}','CategoryController@delete_category');


//Manufacture route
Route::get('/manufacture-all','ManufactureController@manufacture_all');
Route::get('/manufacture-add','ManufactureController@index');
Route::post('/save-manufacture','ManufactureController@save_manufacture');
Route::get('/edit-manufacture/{manufacture_id}','ManufactureController@edit_manufacture');
Route::post('/update-manufacture/{manufacture_id}','ManufactureController@update_manufacture');
Route::get('/delete-manufacture/{manufacture_id}','ManufactureController@delete_manufacture');


//Product route
Route::post('/addproduct','ProductController@add_product')->name('addproduct');
Route::get('/product-all','ProductController@product_all');
Route::get('/product-add','ProductController@index');
Route::post('/save-product','ProductController@save_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::put('/update-product/{product_id}','ProductController@update_product');


//Slider route
Route::get('/slider-all','SliderController@slider_all');
Route::get('/slider-add','SliderController@index');
Route::post('/slideradd','SliderController@save_slider')->name('slideradd');
Route::get('/edit-slider/{slider_id}','SliderController@edit_slider');
Route::put('/update-slider/{slider_id}','SliderController@update_slider');
Route::get('/delete-slider/{slider_id}','SliderController@delete_slider');
