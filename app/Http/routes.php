
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

     Route::post('/regi','UserRegisterController@registeruser');

     Route::get('AddEmployees','HRController@addEmployee');
     Route::get('SearchEmployee',array('as'=>'ViewEmployee','uses'=>'HRController@searchEmployee'));
     Route::post('AddEmployeeDetails','HRController@addEmployeeDetails');




     Route::get('yearlyIncrements','PageController@yearly_Increment_Calculator');
     Route::get('/Usr_register/updateUser', 'UserRegisterController@update');
     Route::get('/Usr_register/deleteUser', 'UserRegisterController@delete');

     Route::get('/Usr_register',array('as'=>'viewEmployees','uses'=>'UserRegisterController@index'));



     Route::get('/userReg',array('as'=>'viewEmployees','uses'=>'UserRegisterController@index'));


     Route::get('/page2','PageController@Page2');

     Route::get('/profile','PageController@profileIndex');

     Route::get('/page3','PageController@Page3');



     Route::get('ApplyLeave','LeavePagesController@ApplyMyLeave');

     Route::get('currentleaves','LeavePagesController@CurrentLeaves');


     Route::get('ApplyLoans','LoanPagesController@applyLoans');

     Route::get('viewLoans','LoanPagesController@viewLoans');
//

     Route::get('insert','AdvanceController@InsertInfo');

     Route::get('addDetails',['uses'=>'AdvanceController@add_Programs','as' => 'addPrograms']);

     Route::get('deleteData',['uses'=>'AdvanceController@Delete_Data','as' => 'deleteData']);

     Route::get('/show','AdvanceController@show');

     Route::get('ad_pro/{ad_pro}/delete','AdvanceController@Delete_Data');

     Route::get('ad_pro/{ad_pro}/edit','AdvanceController@edit_data');

     Route::get('ad_pro/{ad_pro}/update','AdvanceController@update_data');

});



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





