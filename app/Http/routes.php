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
    

    Route::resource('admins','AdminController');
    Route::get('admins/{admin}/destoy',['uses' => 'AdminController@destroy', 'as' => 'admins.destroy']);
    Route::get('admin/users','AdminController@users');
    Route::get('admin/users/{user}/edit',['uses' => 'AdminController@editUser', 'as' => 'admins.editUser']);
    Route::post('admin/users/{user}/update',['uses' => 'AdminController@updateUser', 'as' => 'admins.updateUser']);
    Route::get('admin/users/create',['uses' => 'AdminController@createUser', 'as' => 'admins.createUser']);
    Route::post('admin/users/store',['uses' => 'AdminController@storeUser', 'as' => 'admins.storeUser']);
    Route::get('admin/user/{user}/destroy',['uses' => 'AdminController@destroyUser', 'as' => 'admins.destroyUser']);
    
    Route::resource('users','UserController');
    Route::get('users/{user}/destoy',['uses' => 'UserController@destroy', 'as' => 'users.destroy']);
    
    
    Route::resource('address', 'AddressController');
    Route::get('address/delete/{id}',['as'=>'address.delete','uses'=>'AddressController@delete']);
    Route::post('address/search','AddressController@getAddress');
});



