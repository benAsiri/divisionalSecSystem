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



     Route::get('ApplyLeave','LeavePagesController@ApplyMyLeave');

     Route::get('currentleaves','LeavePagesController@CurrentLeaves');


     Route::get('ApplyLoans','LoanPagesController@applyLoans');

     Route::get('viewLoans','LoanPagesController@viewLoans');

     /**
      * User Profile edit route
      * UserRegisterController -> editProfile function
      */
     Route::get('/EditProfile','UserRegisterController@editProfile');
     /**
      * User Profile Edit Save
      * UserRegisterController -> editProfileSave function
      */
     Route::resource('/EditProfileSave','UserRegisterController@editProfileSave');

    // Route::get('ProgramReport','AdvanceController@AdvanceProgram');

     Route::get('insert','AdvanceController@InsertInfo');

     Route::get('addDetails',['uses'=>'AdvanceController@add_Programs','as' => 'addPrograms']);

     Route::get('deleteData',['uses'=>'AdvanceController@Delete_Data','as' => 'deleteData']);

     Route::get('/show','AdvanceController@show');

     Route::get('ad_pro/{ad_pro}/delete','AdvanceController@Delete_Data');

     Route::get('ad_pro/{ad_pro}/edit','AdvanceController@edit_data');

     Route::get('ad_pro/{ad_pro}/update','AdvanceController@update_data');

});


