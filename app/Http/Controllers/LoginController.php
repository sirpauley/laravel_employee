<?php

namespace SES\Http\Controllers;

use Illuminate\Http\Request;

//additionally added
use View;
use Auth;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{

  /************************************************************
  * showLogin
  ************************************************************/
  public function showLogin()
  {
      // show the form
      if(!Auth::check()){
        return View::make('login');
      }else{
        return redirect()->route('welcome');
      }

  }

  /************************************************************
  * doLogin
  ************************************************************/
  public function doLogin(Request $request)
  {

    print_r($request->all());
    $this->validate($request,[
       'username'      =>'required'
    ]);

    $this->validate($request,[
       'password'      =>'required|alphaNum|min:3'
    ]);

    // create our user data for the authentication
    $userdata = array(
        'username'     => Input::get('username'),
        'password'  => Input::get('password')
    );

    if(Auth::attempt($userdata)){
      //echo 'SUCCESS!';
      return redirect()->route('welcome');
    }else{
      return back()->withErrors(['username' => 'Invalid login!'])->withInput(Input::all());
    }//else Auth

  } //doLogin

  public function doLogout(){
    Auth::logout(); //logout
    return redirect()->route('login');
  }//dologout

}
