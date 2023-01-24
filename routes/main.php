<?php

/*
|--------------------------------------------------------------------------
| Main Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/
Route::group(['prefix' => "admin"], function(){
    
    Route::get('/register', 'Admin\RegisterController@showRegisterForm')->name('admin-register');
    Route::post('/register', 'Admin\RegisterController@register');

});

