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

Route::get('/', function () {
     return view('HR.index'); //this is the path of main page
});

Route::get('kusal','PageController@n');


Route::get('AddEmployees','PageController@addEmployee');

Route::get('yearlyIncrements','PageController@yearly_Increment_Calculator');

Route::get('page1','PageController@Page1');

Route::get('page2','PageController@Page2');

Route::get('page3','PageController@Page3');

Route::get('loans','PageController@Loans');

Route::get('maternityLeaves','PageController@maternityLeaves');

Route::get('currentleaves','PageController@currentleaves');



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
    //
});
