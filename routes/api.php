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

    Route::get('/paginate', 'InstitutionApi@index');
    Route::get('/sort', 'InstitutionApi@sort');
    Route::get('/filter', 'InstitutionApi@filter');
    Route::get('/search', 'API@search');
    Route::get('/time', 'InstitutionApi@time')->name('time');
    Route::post('/updateTime', 'InstitutionApi@updateTime')->name('update.time');
    Route::post('/deleteTime', 'InstitutionApi@deleteTime')->name('delete.time');
});

