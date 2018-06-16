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

Route::get('/', array('uses' => 'LoginController@showLogin'));

// route to show the login form
Route::get('/login', array('as' => 'login','uses' => 'LoginController@showLogin'));
// route to process the form
Route::post('/login', array('uses' => 'LoginController@doLogin'));

Route::get('/welcome', ['as' => 'welcome', 'middleware' => 'isLoggedin',  function(){
  return view('welcome');
}]);

Route::get('logout', ['uses' => 'LoginController@doLogout']);

use App\Employee;

Route::get('/employee',
      [
        'middleware' => 'isLoggedin',
        'uses' => 'employeeController@index',
          // function(){
          //   return view('employee.index');
          // }
      ]
)->name('employee');
