@extends('layouts.standard_layout', ['hasTable' => false])

@section('content')

  <div class='row'>
    <div class='col-12 col-md-4'><h6>NAME:</h6> <p>{{$employee['name'] }}<p></div>
    <div class='col-12 col-md-4'><h6>USERNAME:</h6> <p>{{$employee['username'] }}</p></div>
    <div class='col-12 col-md-4'><h6>EMAIL ADDRESS:</h6> <p>{{$employee['email'] }} </p></div>
  </div>
  <div class='row'>
    <div class='col-12 col-md-4'><h6>TELEPHONE:</h6> <p>{{$employee['tell'] }}</p></div>
    <div class='col-12 col-md-4'><h6>BIRTHDAY:</h6> <p>{{$employee['birthday'] }}</p></div>
    <div class='col-12 col-md-4'><h6>EMPLOYEED date:</h6><p> {{$employee['created'] }}</p></div>
  </div>

  <div class='row'>
    <div class='col-12 col-md-4'><h6>ADMIN:</h6>
      @if($employee['admin_right'] == 1)
        <p>YES</p>
      @else
        <p>NO</p>
      @endif
    </div>
  </div>


<br>
<div class='row'>
<div class='col'><a href="{{ route('employee') }}"><button class="btn btn-warning"><em class="fa fa-arrow-left"></em> Back</button></a></div>
</div>

@stop
