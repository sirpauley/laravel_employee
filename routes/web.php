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

/************************************************************
* LOGIN
************************************************************/
Route::get('/', array('uses' => 'LoginController@showLogin'));

// route to show the login form
Route::get('/login', array('as' => 'login','uses' => 'LoginController@showLogin'));
// route to process the form
Route::post('/login', array('uses' => 'LoginController@doLogin'));

Route::get('/welcome', ['as' => 'welcome', 'middleware' => 'isLoggedin',  function(){
  return view('welcome');
}]);

Route::get('logout', ['uses' => 'LoginController@doLogout'])->name('logout');

/************************************************************
* EMPLOYEES
************************************************************/
use App\Employee;

//employee table & controls
Route::get('/employee', ['middleware' => 'isLoggedin', 'uses' => 'employeeController@index',])->name('employee');

//add a new employee
Route::get('/employee/add', ['middleware' => 'isLoggedin', 'uses' => 'employeeController@add',])->name('new employee');

//create the new employee
//add a new employee
Route::post('/employee/add', ['middleware' => 'isLoggedin', 'uses' => 'employeeController@addEmployee',])->name('new employee');

//view employee details
Route::get('/employee/details/{id}', ['middleware' => 'isLoggedin', 'uses' => 'employeeController@details',])->name('employee details');

//view employee details
Route::get('/employee/edit/{id}', ['middleware' => 'isLoggedin', 'uses' => 'employeeController@editPage',])->name('employee edit');

//view employee details
Route::post('/employee/edit/{id}', ['middleware' => 'isLoggedin', 'uses' => 'employeeController@saveEdit',])->name('employee edit save');

/************************************************************
* STATISTICS
************************************************************/

/************************************************************
* PHONEBOOK
************************************************************/
//phonebook of employees table
Route::get('/phonebook', ['middleware' => 'isLoggedin', 'uses' => 'phonebookController@index',])->name('phonebook');

Route::get('/phonebook/details/{id}', ['middleware' => 'isLoggedin', 'uses' => 'phonebookController@details',])->name('phonebook details');

/************************************************************
* LEAVE A REVIEWs
************************************************************/

/************************************************************
* PASSWORD
************************************************************/
//phonebook of employees table
Route::get('/password', ['middleware' => 'isLoggedin', 'uses' => 'passwordResetController@index',])->name('password');

//edit password
Route::get('/password/reset/{id}', ['middleware' => 'isLoggedin', 'uses' => 'passwordResetController@reset',])->name('password reset');

//save new password for user
Route::post('/password/reset/{id}', ['middleware' => 'isLoggedin', 'uses' => 'passwordResetController@saveReset',])->name('password reset');
