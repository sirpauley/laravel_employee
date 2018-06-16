<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Addition added
use App\Employee;
use Session;

class employeeController extends Controller
{

  public function index(){
    //fetch all employees
    $employees = Employee::orderBy('created','desc')->get();

    //pass employees data to view and load list view
  return view('employee.index', ['employees' => $employees]);
  }

}
