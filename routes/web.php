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
    return view('welcome');
});

//Auth::routes();




Route::get('/admin', 'LoginController@adminLoginForm')->name('adminLoginFrom');
Route::get('/login', 'LoginController@customerLoginForm')->name('login');
Route::get('/admin/register', 'RegisterController@adminRegisterForm')->name('adminRegisterForm');
Route::get('/register', 'RegisterController@customerRegisterForm')->name('customerRegisterFrom');

Route::post('/admin/login', 'LoginController@adminLogin')->name('adminLogin');
Route::post('/customer/login', 'LoginController@customerLogin')->name('customerLogin');
Route::post('/admin/register', 'RegisterController@createAdmin')->name('adminRegister');
Route::post('/customer/register', 'RegisterController@createCustomer')->name('customerRegister');









Route::group(['middleware' => ['auth:admin']], function() {     
    Route::get('/admin/dashboard', 'AdminController@dashboard')->name('adminDashboard');
    Route::post('/admin/logout', 'LogoutController@adminLogout')->name('adminLogout');
    Route::get('/admin/product/create', 'AdminController@createProduct')->name('product.create');
    Route::get('/admin/product/{id}/edit', 'AdminController@editProduct')->name('product.edit');
    Route::post('/admin/product/{id}/update', 'AdminController@updateProduct')->name('product.update');
    Route::post('/admin/product/{id}/delete', 'AdminController@deleteProduct')->name('product.delete');
    Route::post('/admin/product/store', 'AdminController@storeProduct')->name('product.store');
});


Route::group(['middleware' => ['auth:customer']], function() { 
    Route::post('/logout', 'LogoutController@customerLogout')->name('customerLogout');
    Route::get('/dashboard', 'customerController@dashboard')->name('customerDashboard');
});
