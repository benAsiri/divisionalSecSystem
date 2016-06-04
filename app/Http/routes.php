
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







Route::group(['middleware' =>'web'], function () {
     Route::auth();
     Route::get('/', 'HomeController@index');



     Route::get('AddEmployees','HRController@addEmployee');
     Route::get('SearchEmployee',array('as'=>'ViewEmployee','uses'=>'HRController@searchEmployee'));


     Route::get('yearlyIncrements','PageController@yearly_Increment_Calculator');




     Route::get('/Usr_register',array('as'=>'viewEmployees','uses'=>'UserRegisterController@index'));

     Route::get('/page2','PageController@Page2');

     Route::get('/page3','PageController@Page3');

     Route::get('loans','PageController@Loans');

     Route::get('maternityLeaves','PageController@maternityLeaves');

     Route::get('currentleaves','PageController@currentleaves');

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




