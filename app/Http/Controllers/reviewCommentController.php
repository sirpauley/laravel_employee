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

class reviewCommentController extends Controller
{
  public function index(){
    //fetch all employees
    $employees = Employee::orderBy('created','desc')->get();

    $employeesAddedLikes = array();

    foreach ($employees as $value) {
      $like = DB::table('likes')
                  ->select('id', 'employee_id', 'employee_liked_id')
                  ->where('employee_id' , '=', Auth::user()->id)
                  ->where('employee_liked_id', '=', $value->id)
                  ->first();

      if($like === null){
        $liked = false;
      }else{
        $liked = true;
      }//else

      $value['liked'] = $liked;
      $employeesAddedLikes[] = $value;

    }

    //pass employees data to view and load list view
  return view('reviewComment.index', ['employees' => $employeesAddedLikes]);
  }

  public function like($id){
    $likeCreate['employee_id'] = Auth::user()->id;
    $likeCreate['employee_liked_id'] = $id;

    //insert likes data
    like::create($likeCreate);

    return redirect()->route('review');
  }

  public function unlike($id){
    like::where('employee_id', Auth::user()->id )->where('employee_liked_id', $id)->delete();
    return redirect()->route('review');
  }

}
