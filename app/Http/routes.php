
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

     Route::group(['middleware'=>'userfilter'],function(){

          Route::post('/regi','UserRegisterController@registeruser');
          Route::get('/Usr_register/updateUser', 'UserRegisterController@update');
          Route::get('/Usr_register/deleteUser', 'UserRegisterController@delete');
          Route::get('/Usr_register/resetPwd', 'UserRegisterController@resetPW');
          Route::get('/Usr_register',array('as'=>'viewEmployees','uses'=>'UserRegisterController@index'));
          Route::get('LeaveMgt/applyleave',array('as'=>'viewLeaves','uses'=>'LeaveController@index'));




     Route::get('AddEmployees','HRController@addEmployee');
     Route::get('SearchEmployee',array('as'=>'ViewEmployee','uses'=>'HRController@searchEmployee'));
     Route::post('AddEmployeeDetails','HRController@addEmployeeDetails');
     Route::get('LoadEmployeeDetails','HRController@loadUpdateEmployees');
     Route::get('LoadEmployeeSalDetails','HRController@loadEmpSalary');
     Route::post('AddSalary','HRController@addSalaryDetails');
     Route::get('/generatePDF_Emp','HRController@generatePDF');
     Route::get('Delete/{id}','HRController@deleteEmployee');
     Route::post('UpdateEmpDetail','HRController@UpdateEmployeeDetail');





     Route::get('yearlyIncrements','PageController@yearly_Increment_Calculator');

          Route::get('LeaveMgt/updateleave','LeaveController@updateleave');
          Route::post('LeaveMgt/addleave','LeaveController@addleave');
          Route::get('LeaveMgt/deleteleave', 'LeaveController@deleteleave');
          Route::get('/LeaveStatus','LeaveController@indexforHead');
          Route::get('/LeaveStatus/Reject','LeaveController@Reject');
          Route::get('/LeaveStatus/Approve','LeaveController@Approve');
          Route::get('/view_remaining','LeaveController@remaining');


     });

     Route::group(['middleware'=>'HR'],function(){

     Route::get('AddEmployees','HRController@addEmployee');

     Route::get('yearlyIncrements','PageController@yearly_Increment_Calculator');

     Route::get('/page2','PageController@Page2');

     Route::get('/profile','PageController@profileIndex');

     Route::get('/page3','PageController@Page3');



     Route::get('ApplyLeave','LeavePagesController@ApplyMyLeave');
     Route::get('currentleaves','LeavePagesController@CurrentLeaves');

    //Matenarity Leaves
     Route::get('ViewMateneryLeaves','MleavesController@viewMleaves');
     Route::get('AddMateneryLeaves','MleavesController@addMleaves');
     Route::post('addMleavesDetails','MleavesController@addMleavesDetails');









     Route::get('ApplyLoans','LoanPagesController@applyLoans');

     Route::get('viewLoans','LoanPagesController@viewLoans');










     Route::get('insert','AdvanceController@InsertInfo');

     Route::get('addDetails',['uses'=>'AdvanceController@add_Programs','as' => 'addPrograms']);

     Route::get('deleteData',['uses'=>'AdvanceController@Delete_Data','as' => 'deleteData']);

     Route::get('/show','AdvanceController@show');

     Route::get('ad_pro/{ad_pro}/delete','AdvanceController@Delete_Data');

     Route::get('ad_pro/{ad_pro}/edit','AdvanceController@edit_data');

     Route::get('ad_pro/{ad_pro}/update','AdvanceController@update_data');





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


     Route::get('insert','AdvanceController@InsertInfo');

     Route::post('addDetails',['uses'=>'AdvanceController@add_Programs','as' => 'addPrograms']);

     Route::get('deleteData',['uses'=>'AdvanceController@Delete_Data','as' => 'deleteData']);

     Route::get('/show','AdvanceController@show');

     Route::get('ad_pro/{ad_pro}/delete','AdvanceController@Delete_Data');

     Route::get('ad_pro/{ad_pro}/edit','AdvanceController@edit_data');

     Route::get('ad_pro/{ad_pro}/update','AdvanceController@update_data');


     /**
      * Generate PDF
      */
     Route::get('/generatePDF','AdvanceController@generatePDF');







     });

     Route::group(['middleware'=>'LR'],function(){


     });









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





