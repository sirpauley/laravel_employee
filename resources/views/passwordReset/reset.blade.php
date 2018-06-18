@extends('layouts.standard_layout', ['hasTable' => false])

@section('content')

<!-- RESET password only accesable to admin users-->

<div class="container">

    @if($errors->any())
      <div class="row">
        <div class="col-12 col-md-4"> </div>
        <div class="col-12 col-md-4 align-self-center alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach()
        </div>
      </div>
    @endif

</div>

<div class="container">

  <div class="row col-12">
    <h3>Change password for user: <em>{{ $employee->username }}</em></h3>
  </div>
{{ Form::open(array( route('password reset', $employee->id) , 'class' => 'form-inline')) }}
    {{ csrf_field() }}

    <div class="row col-12">
      <!--**************************** password ************************************-->
      {{ Form::label('password', 'NEW PASSWORD: ', array('class' => 'col-sm-6 col-md-3',)) }}
      {{Form::password('password', array('placeholder' => 'password', 'class' => 'form-control col-sm-6 col-md-4'))}}
    </div>

    <div class="row col-12">
      <!--**************************** repassword ************************************-->
      {{ Form::label('password_confirmation', 'RETYPE PASSWORD: ', array('class' => 'col-sm-6 col-md-3',)) }}
      {{Form::password('password_confirmation', array('placeholder' => 'retype password', 'class' => 'form-control col-sm-6 col-md-4'))}}
    </div>

    <br>

    <div class="col-md-12">
    <br>
      <button type="submit" class="btn btn-success pull-left"><em class="fa fa-pencil-square-o "></em> SAVE</button>
    </div>

    <div class="col-md-12">
    <br>
      <a href="{{ route('password') }}" class="pull-left"><button type="button" class="btn btn-warning"><em class="fa fa-arrow-left"></em> Back</button></a>
    </div>

  {{ Form::close() }}
</div>

@stop
