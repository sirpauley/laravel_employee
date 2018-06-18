<?php

namespace SES\Http\Controllers;

use Illuminate\Http\Request;

class redirectLogin extends Controller
{

  /************************************************************
  * index
  ************************************************************/
  public function index(){
    return redirect()->route('login');
  }

}
