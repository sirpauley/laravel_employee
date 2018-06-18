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

  /************************************************************
  * index
  ************************************************************/
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

  /************************************************************
  * like
  ************************************************************/
  public function like($id){
    $likeCreate['employee_id'] = Auth::user()->id;
    $likeCreate['employee_liked_id'] = $id;

    //insert likes data
    like::create($likeCreate);

    return redirect()->route('review');
  }

  /************************************************************
  * unlike
  ************************************************************/
  public function unlike($id){
    like::where('employee_id', Auth::user()->id )->where('employee_liked_id', $id)->delete();
    return redirect()->route('review');
  }

  /************************************************************
  * comment
  ************************************************************/
  public function comment($id){
      $comments = ReviewComment::orderBy('created','desc')->where('employee_id', '=', $id)->get();
      $employee = Employee::where('id', '=', $id)->first();

      $employees = Employee::orderBy('created','desc')->get();
      $employeesByID = array();
      foreach ($employees as $key => $value) {
        $employeesByID[$value['id']] = $value['name'];
      }


    return view('reviewComment.comment', ['comments' => $comments, 'employee' => $employee, 'employeesByID'=> $employeesByID, 'id' => $id]);
  }

  /************************************************************
  * saveComment
  ************************************************************/
  public function saveComment(Request $request){

    /*************VALIDATION**************/
    $this->validate($request,[
       'message'      =>'required|min:5'
    ]);

    /******************SAVE DATA**********************/
    //get employee data
    $commentData = $request->all();
    $commentData['employee_id'] = $request['employee_id'];
    $commentData['reviewer_id'] = Auth::user()->id;
    $commentData['comment'] = $request->message;

    ReviewComment::create($commentData);

    return redirect()->route('comment', $request['employee_id'])->with( ['msg' => 'Comment created succesfully'] );

  }

}
