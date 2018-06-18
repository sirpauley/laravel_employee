<?php

namespace SES\Http\Controllers;

use Illuminate\Http\Request;

//Addition added
use SES\Employee;
use SES\like;
use SES\ReviewComment;
use Session;
use Auth;
use DB;

class statisticsController extends Controller
{

  public function index(){

      // $comments = ReviewComment::orderBy('created','desc')->where('employee_id', '=', $id)->get();
      // $employee = Employee::where('id', '=', $id)->first();
      //
      // $employees = Employee::orderBy('created','desc')->get();
      // $employeesByID = array();
      // foreach ($employees as $key => $value) {
      //   $employeesByID[$value['id']] = $value['name'];
      // }

      $birthdays      = Employee::orderBy('birthday','asc')->whereMonth('birthday', date('m'))->get();
      $totalEmployees = Employee::orderBy('created','asc')->count();
      $totalComments  = ReviewComment::orderBy('created','desc')->count();
      $totalLikes     = like::orderBy('created','desc')->count();

      //top 10 liked employees algorithem
      $topTenList = array();
      $Employees = Employee::orderBy('created','asc')->get();

      //create new array with employee names and amout of likes per employee
      foreach ($Employees as $Employee) {
        $amountOfLikes  = like::orderBy('created','desc')->where('employee_liked_id', '=', $Employee['id'])->count();
        $topTenList[] = array('name' => $Employee['name'], 'likes' => $amountOfLikes);
      }
      //arrange from high to low
      usort($topTenList, function($a, $b) {
        return  $b['likes'] - $a['likes'];
      });
      //get top 10
      $Length = (count($topTenList) < 10)? count($topTenList) : 10;
      $topTenList = array_slice($topTenList, 0, $Length);



      //return view('statistics.index', ['birthdays' => $birthdays, 'employee' => $employee, 'employeesByID'=> $employeesByID]);
    return view('statistics.index', [
                                    'birthdays' => $birthdays,
                                    'totalEmployees' => $totalEmployees,
                                    'totalComments' => $totalComments,
                                    'totalLikes' => $totalLikes,
                                    'topTenList' => $topTenList
                                  ]);
  }

}
