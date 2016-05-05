<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get('/', 'Admin\HomeController@index');

    //Editors Only
    Route::group(['middleware' => 'editor'], function() {
        Route::resource('articles', 'Admin\ArticlesController', ['except' => 'destroy']);
        Route::resource('pages', 'Admin\PagesController');
        Route::resource('sections', 'Admin\SectionsController');
        Route::resource('styles', 'Admin\StylesController');
    });

    //Admins Only
    Route::group(['middleware' => 'admin'], function(){
        Route::resource('users', 'Admin\UsersController');
    });
});

Route::get('/','WebsiteController@show');
Route::get('/{slug}','WebsiteController@show');
Route::group(['middleware'=> 'author'], function(){
    Route::resource('articles', 'WebsiteController', ['except' => ['destroy','show','index']]);
});


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
