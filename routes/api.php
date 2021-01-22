<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(["middleware =>'auth:api'"], function(){

    Route::get('/paginate', 'API@index');
    Route::get('/sort', 'API@sort');
    Route::get('/filter', 'API@filter');
    Route::get('/search', 'API@search');
    Route::get('time', 'API@time')->name('time');
    Route::post('updateTime', 'API@updateTime')->name('update.time');
});

