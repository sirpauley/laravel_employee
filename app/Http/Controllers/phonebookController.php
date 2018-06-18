<?php

namespace SES\Http\Controllers;

use Illuminate\Http\Request;

//Addition added
use SES\Employee;

class phonebookController extends Controller
{

  /************************************************************
  * index
  ************************************************************/
  public function index(){
    //fetch all employees
    $employees = Employee::orderBy('created','desc')->get();

    //pass employees data to view and load list view
  return view('phonebook.index', ['employees' => $employees]);
  }

  /************************************************************
  * details
  ************************************************************/
  public function details($id){
    //fetch employee data
    $employee = Employee::find($id);

    //pass employees data to view and load list view
  return view('phonebook.details', ['employee' => $employee]);
  }

}
