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

Route::get('/', function () {
    return view('index');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/products', function () {
    return view('products');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/product_details', function () {
    return view('product_details');
});
