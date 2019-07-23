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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

Route::get('/', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

//user routes
Route::get('/account', 'UserController@account');
Route::get('/newuser', 'UserController@index')->name('newuser');
Route::get('/userlist', 'UserController@showUserList')->name('userlist');
Route::get('/delete-user/{id}', 'UserController@removeUser');
Route::get('/disable-user/{id}', 'UserController@disableUser');
Route::get('/enable-user/{id}', 'UserController@enableUser');

//company routes
Route::get('company-list', 'CompanyController@showCompany');
Route::get('company-create', 'CompanyController@addCompany');
Route::post('company-create', 'CompanyController@createCompany');
Route::get('/company-delete/{id}', 'CompanyController@removeCompany');

//merchant routes
Route::get('merchant-find', 'MerchantController@findMerchant');
Route::post('merchant-find', 'MerchantController@resultsMerchant');
Route::get('merchant-list', 'MerchantController@showMerchant');
Route::get('merchant-create', 'MerchantController@addMerchant');
Route::post('merchant-create', 'MerchantController@createMerchant');
Route::get('/merchant-delete/{id}', 'MerchantController@removeMerchant');

//purchase order routes
Route::get('po-export', 'PoController@export');
Route::get('po-list', 'PoController@listPo');
Route::get('po-create', 'PoController@addPo');
Route::post('po-create', 'PoController@createPo');
Route::get('po-created', 'PoController@createdPo');
Route::get('po-edit/{id}', 'PoController@showPo');
Route::post('po-edit/{id}', 'PoController@editPo');

});
