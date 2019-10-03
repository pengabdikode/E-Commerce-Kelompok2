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

// Route::get('/', function () {
//     return view('welcome');
// });

//index
Route::get('/index','IndexController@index');

//register
Route::get('/guest/register','IndexController@register');

//cart
Route::get('/cart','IndexController@cart');
Route::match(['get','post'],'/add-cart/{id}','IndexController@addcart');
Route::match(['get','post'],'/update-cart/{id}/{size}', 'IndexController@updateCart');
Route::get('/remove-from-cart/{id}', 'IndexController@removeCart');

//product
Route::get('/product','IndexController@product');
Route::get('/viewby-product/{view}/{id}','IndexController@viewby_product');
Route::match(['get','post'],'/detail/{id}','IndexController@detail');

//login
Route::match(['get','post'],'/e-shop/login','AdminController@login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>['auth']],function(){

	//route for change password(admin)
	Route::get('/admin/dashboard','AdminController@dashboard');
	Route::get('/admin/setting','AdminController@setting');
	Route::get('/admin/check-pwd', 'AdminController@chkpassword');
	Route::match(['get','post'],'/admin/update-pwd','AdminController@updatepassword');

	//route for category(admin)
	Route::match(['get','post'],'/admin/add-category','CategoryController@addcategory');
	Route::match(['get','post'],'/admin/edit-category/{id}','CategoryController@editcategory');
	Route::match(['get','post'],'/admin/delete-category/{id}','CategoryController@deletecategory');
	Route::get('/admin/view-category','CategoryController@viewcategory');

	//route for product(admin)
	Route::match(['get','post'],'/admin/add-product','ProductController@addproduct');
	Route::match(['get','post'],'/admin/edit-product/{id}','ProductController@editproduct');
	Route::match(['get','post'],'/admin/delete-product/{id}','ProductController@deleteproduct');
	Route::get('/admin/view-product','ProductController@viewproduct');

	//route for brand(admin)
	Route::match(['get','post'],'/admin/add-brand','BrandController@addbrand');
	Route::match(['get','post'],'/admin/edit-brand/{id}','BrandController@editbrand');
	Route::match(['get','post'],'/admin/delete-brand/{id}','BrandController@deletebrand');
	Route::get('/admin/view-brand','BrandController@viewbrand');

	//route for stock(admin)
	Route::match(['get','post'],'/admin/add-stock','StockController@addstock');
	Route::match(['get','post'],'/admin/edit-stock/{id}','StockController@editstock');
	Route::match(['get','post'],'/admin/delete-stock/{id}','StockController@deletestock');
	Route::get('/admin/view-stock','StockController@viewstock');

	//route for monetary(admin)//
	
	//transaction//
	Route::match(['get','post'],'/admin/monetary-editTransaction/{id}','Monetary_Controller@edittransaction');
	Route::get('/admin/monetary-viewTransaction','Monetary_Controller@viewtransaction');

	//bank//
	Route::match(['get','post'],'/admin/monetary-addBank','Monetary_Controller@addbank');
	Route::match(['get','post'],'/admin/monetary-editBank/{id}','Monetary_Controller@editbank');
	Route::match(['get','post'],'/admin/monetary-deleteBank/{id}','Monetary_Controller@deletebank');
	Route::get('/admin/monetary-viewBank','Monetary_Controller@viewbank');


});

Route::get('/logout','AdminController@logout');

Route::group(['middleware'=>['auth']],function(){

	
	//checkout
Route::match(['get','post'],'/checkout','IndexController@checkout');

});

// Route::get('/logout','AdminController@logout');

