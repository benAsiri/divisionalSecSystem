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







Route::group(['middleware' => 'web'], function () {
     Route::auth();
     Route::get('/', 'HomeController@index');

     Route::get('/home', 'HomeController@index');

     Route::get('AddEmployees','PageController@addEmployee');

     Route::get('yearlyIncrements','PageController@yearly_Increment_Calculator');



     Route::get('/userReg',array('as'=>'viewEmployees','uses'=>'UserRegisterController@index'));

     Route::get('/page2','PageController@Page2');

     Route::get('/page3','PageController@Page3');

     Route::get('loans','PageController@Loans');

     Route::get('ApplyLeave','PageController@ApplyMyLeave');

     Route::get('currentleaves','PageController@currentleaves');

});


