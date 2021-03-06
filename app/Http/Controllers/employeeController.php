<?php

namespace SES\Http\Controllers;

use Illuminate\Http\Request;

//Addition added
use SES\Employee;
use Session;
use Hash;

class employeeController extends Controller
{

  /************************************************************
  * index page view
  ************************************************************/
  public function index(){
    //fetch all employees
    $employees = Employee::orderBy('created','desc')->get();

    //pass employees data to view and load list view
  return view('employee.index', ['employees' => $employees]);
  }

  /************************************************************
  * show add page
  ************************************************************/
  public function add(){
    //pass employees data to view and load list view
    return view('employee.add');
  }

  /************************************************************
  * add employee to database
  ************************************************************/
  public function addEmployee(Request $request){
    //return view('employee.add');

    /*************VALIDATION**************/
    $this->validate($request,[
       'name'      =>'required|min:3'
    ]);

    $this->validate($request,[
       'username'      =>'required|min:3'
    ]);

    $this->validate($request,[
       'password'      =>'required|alphaNum|min:6|confirmed'
    ]);

    $this->validate($request,[
       'email'      =>'required|email|min:6'
    ]);

    $this->validate($request,[
       'tell'      =>'required|min:10|regex:(^0[1-9][0-9]{8})'
    ]);

    $this->validate($request,[
       'birthday'      =>'required'
    ]);

    $this->validate($request,[
       'admin_right'      =>'required'
    ]);


    /******************SAVE DATA**********************/
    //get employee data
    $employeeData = $request->all();
    $employeeData['password'] = Hash::make($employeeData['password']);
    //insert employee data
    Employee::create($employeeData);

    return redirect()->route('employee')->with( ['msg' => 'Employee created succesfull'] );

  }

  /************************************************************
  * details page
  ************************************************************/
  public function details($id){
    //fetch employee data
    $employee = Employee::find($id);

    //pass employee data to view and load list view
    return view('employee.details', ['employee' => $employee]);

  }

  /************************************************************
  * so edit page
  ************************************************************/
  public function editPage($id){
    //fetch employee data
    $employee = Employee::find($id);

    //pass employee data to view and load list view
    return view('employee.edit', ['employee' => $employee]);

  }

  /************************************************************
  * saveEdit change to database
  ************************************************************/
  public function saveEdit($id, Request $request){

    /*************VALIDATION**************/
    $this->validate($request,[
       'name'      =>'required|min:3'
    ]);

    $this->validate($request,[
       'email'      =>'required|email|min:6'
    ]);

    $this->validate($request,[
       'tell'      =>'required|min:10|regex:(^0[1-9][0-9]{8})'
    ]);

    $this->validate($request,[
       'birthday'      =>'required'
    ]);

    $this->validate($request,[
       'admin_right'      =>'required'
    ]);

    //get all data send
    $EmployeeData = $request->all();

    //UPDATE
    Employee::find($id)->update($EmployeeData);

    //back to employee page
    return redirect()->route('employee')->with( ['msg' => 'Employee succesfull updated'] );

  }


}
