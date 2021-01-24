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



Route::group(['prefix' => 'admin'],  function () {

    Route::get('/login', 'Admin\LoginController@showLoginForm')->name('admin-login');
    Route::post('/login', 'Admin\LoginController@authenticate');
    Route::get('/', 'Admin\AdminController@index')->name('dashboard');

    //logout route
    Route::get('/logout', 'Admin\LoginController@logout')->name('admin-logout');

    //Admin CRUD route
    Route::get('/AdminSection', 'Admin\AdminController@Admin')->name('Admin-Section');
    Route::post('/Add-Admin', 'Admin\AdminController@create')->name('Add-Admin');
    Route::post('/Update-Admin', 'Admin\AdminController@update')->name('Update-Admin');
    Route::post('/Delete-Admin', 'Admin\AdminController@destroy')->name('Delete-Admin');

    //Class CRUD route
    Route::get('/ClassSection', 'Admin\UserController@Class')->name('Class-Section');
    Route::post('/Add-Class', 'Admin\UserController@addClass')->name('Add-Class');
    Route::post('/Delete-Class', 'Admin\UserController@deleteClass')->name('Delete-Class');
    
    //Student CRUD
    Route::get('/StudentSection', 'Admin\UserController@Users')->name('Student-Section');
    Route::post('/Add-Student', 'Admin\UserController@createUser')->name('Add-Student');
    Route::post('/Delete-Student', 'Admin\UserController@destroy')->name('Delete-Student');

    //Subject CRUD
    Route::get('/SubjectSection', 'Admin\UserController@Subjects')->name('Subject-Section');
    Route::post('/Add-Subject', 'Admin\UserController@createSubject')->name('Add-Subject');
    Route::post('/Delete-Subject', 'Admin\UserController@deleteSubject')->name('Delete-Subject');

    // Topic CRUD
    Route::get('/TopicSection', 'Admin\UserController@Topic')->name('Topic-Section');
    Route::post('/Add-Topic', 'Admin\UserController@createTopic')->name('Add-Topic');
    
    // Question
    Route::get('/Question', 'Admin\UserController@topicQuestion')->name('Question-Section');
    Route::post('/Add-Question', 'Admin\UserController@createTopicQuestion')->name('Add-Question');
    Route::post('/Update-Question', 'Admin\UserController@updateTopicQuestionAndOption')->name('Update-Question');
    Route::get('/getsinglequestion', 'Admin\UserController@getTopicQuestionAndOption')->name('Single-Question');
    Route::get('/getallquestion', 'Admin\UserController@getAllTopicQuestionAndOption')->name('All-Question');
    Route::get('/table', 'Admin\UserController@testTable');

    // set time route
    Route::get('/set-time/{id}', 'Admin\UserController@setExamTimeView')->name('set-time');
    Route::post('/setexamtime/{id}','Admin\UserController@setExamTime')->name('setExamTime');

    
    //Forgot Password Routes
    Route::get('/password/reset','Admin\ForgotpasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/email','Admin\ForgotpasswordController@sendResetLinkEmail')->name('admin.password-email');

    //Reset Password Routes
    Route::get('/password/reset/{token}','Admin\ResetpasswordController@showResetForm')->name('password.reset');
    Route::post('/password/reset','Admin\ResetpasswordController@reset')->name('admin.password-update');

    // email confirmation route
    Route::get('/activation/{token}','Admin\RegisterController@adminActivation')->name('email-confirmation');

});


    Route::get('/login', 'Auth\LoginController@showLoginForm');
    Route::post('/login', 'Auth\LoginController@login')->name('login');
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::post('/MySubject', 'HomeController@createUserSubject')->name('User-Subject');
    Route::get('/Mycourses', 'HomeController@displayUserSubjects')->name('User-Courses');
    Route::get('/topics', 'HomeController@getTopic')->name('topics');
    Route::get('/ViewTopic', 'HomeController@viewTopic')->name('Get-Topic');
    Route::get('/downloadfile', 'HomeController@downloadfile')->name('download-file');

    // test question
    Route::get('/mytest', 'questionController@view')->name('test-question');
    Route::post('/mytest','questionController@getQuestions')->name('get-myquestion');

    Route::post('mark-my-test','questionController@mark')->name('mark');



