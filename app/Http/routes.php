<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    
    Route::get('login','LoginController@getLogin');
    Route::post('login','LoginController@postLogin');
    Route::get('logout','LoginController@getLogout');
    Route::get('register','LoginController@getRegister');
    Route::post('register','LoginController@postRegister');
    
    Route::get('/','IndexController@getIndex');
    Route::get('sendEmail/{id}','AddressController@getSendEmail');
    Route::post('sendEmail/{id}','AddressController@postSendEmail');
    
    Route::resource('admin','AdminController',['except' => ['show']] );
    Route::get('admin/delete/{id}',['as'=>'admin.delete','uses'=>'AdminController@delete']);
    
    Route::get('admin/users',['as'=>'adminUsers','uses'=>'UserController@getAdminUsers']);
    Route::get('admin/user/edit/{id}',['as'=>'editAdminUser','uses'=>'UserController@getEditAdminUser']);
    Route::post('admin/user/update/{id}',['as'=>'updateAdminUser','uses'=>'UserController@postUpdateAdminUser']);
    Route::get('admin/user/create','UserController@getNewAdminUser');
    Route::post('admin/user/create',['as'=>'storeAdminUser','uses'=>'UserController@postNewUser']);
    Route::get('admin/user/delete/{id}',['as'=>'deleteAdminUser','uses'=>'UserController@getDeleteAdminUser']);
    
    Route::get('user','UserController@getUser');
    
    Route::resource('address', 'AddressController');
    Route::get('address/delete/{id}',['as'=>'address.delete','uses'=>'AddressController@delete']);
    Route::post('address/search','AddressController@getAddress');
});



