<?php

namespace SES\Http\Controllers;

use Illuminate\Http\Request;

//Addition added
use SES\Employee;
use Hash;

class passwordResetController extends Controller
{

  public function index(){
    //fetch all employees
    $employees = Employee::orderBy('created','desc')->get();

    //pass employees data to view and load list view
    return view('passwordReset.index', ['employees' => $employees]);
  }

  public function reset($id){
    //fetch employee data
    $employee = Employee::find($id);

    //pass employees data to view and load list view
  return view('passwordReset.reset', ['employee' => $employee]);
  }

  public function saveReset($id, Request $request){

    /*************VALIDATION**************/
    $this->validate($request,[
       'password'      =>'required|alphaNum|min:3|confirmed'
    ]);


    //get all data send
    $EmployeeData = $request->all();

    //HASH password
    $EmployeeData['password'] = Hash::make($EmployeeData['password']);

    //UPDATE
    Employee::find($id)->update($EmployeeData);

    //back to employee page
    return redirect()->route('password')->with( ['msg' => 'Password succesfull changed'] );

  }


}
