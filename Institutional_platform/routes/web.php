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

//Route::get('/', 'HomeController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
    
    Route::get('/login', 'Admin\LoginController@showLoginForm')->name('admin-login');
    Route::post('/login', 'Admin\LoginController@authenticate');
    Route::get('/', 'Admin\AdminController@index')->name('dashboard');
    Route::get('/logout', 'Admin\LoginController@logout')->name('admin-logout');

    //Forgot Password Routes
    Route::get('/password/reset','ForgotpasswordController@showLinkRequestForm')->name('password-request');
    Route::post('/password/email','ForgotpasswordController@sendResetLinkEmail')->name('password-email');

    //Reset Password Routes
    Route::get('/password/reset/{token}','ResetpasswordController@showResetForm')->name('password-reset');
    Route::post('/password/reset','ResetpasswordController@reset')->name('password-update');

    // email confirmation route
    Route::get('/activation/{token}','Institution\RegisterController@adminActivation')->name('email-confirmation');
});
