@extends('layouts.standard_layout', ['hasTable' => false])

@section('content')


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
{{ Form::open(array('route' => 'new employee' , 'class' => 'form-inline')) }}
    {{ csrf_field() }}

    <!--**************************** NAME ************************************-->
    {{ Form::label('name', 'NAME: ', array('class' => 'col-sm-6 col-md-3',)) }}
    {{Form::text('name', '', array('placeholder' => 'name', 'class' => 'form-control col-sm-6 col-md-3'))}}

    <!--**************************** username ************************************-->
    {{ Form::label('username', 'USERNAME: ', array('class' => 'col-sm-6 col-md-3',)) }}
    {{Form::text('username', '', array('placeholder' => 'username', 'class' => 'form-control col-sm-6 col-md-3'))}}

    <!--**************************** password ************************************-->
    {{ Form::label('password', 'PASSWORD: ', array('class' => 'col-sm-6 col-md-3',)) }}
    {{Form::password('password', array('placeholder' => 'password', 'class' => 'form-control col-sm-6 col-md-3'))}}

    <!--**************************** repassword ************************************-->
    {{ Form::label('password_confirmation', 'RETYPE PASSWORD: ', array('class' => 'col-sm-6 col-md-3',)) }}
    {{Form::password('password_confirmation', array('placeholder' => 'password', 'class' => 'form-control col-sm-6 col-md-3'))}}

    <!--**************************** email ************************************-->
    {{ Form::label('email', 'EMAIL: ', array('class' => 'col-sm-6 col-md-3',)) }}
    {{Form::text('email', '', array('placeholder' => 'email', 'class' => 'form-control col-sm-6 col-md-3'))}}

    <!--**************************** tell ************************************-->
    {{ Form::label('tell', 'TELL: ', array('class' => 'col-sm-6 col-md-3',)) }}
    {{Form::text('tell', '', array('placeholder' => 'tell', 'class' => 'form-control col-sm-6 col-md-3', 'pattern' => '(^0[1-9][0-9]{8})'))}}

    <!--**************************** birthday ************************************-->
    {{ Form::label('birthday', 'BIRTHDAY: ', array('class' => 'col-sm-6 col-md-3',)) }}
    {{Form::date('birthday', '', array('class' => 'form-control col-sm-6 col-md-3')) }}

    <!--**************************** admin_right ************************************-->
    {{ Form::label('admin_right', 'ADMIN RIGHTS: ', array('class' => 'col-sm-6 col-md-3',)) }}
    {{Form::select('admin_right', array(1=> 'YES', 0 => 'NO'), NULL, array('placeholder' => ' - SELECT - ', 'class' => 'form-control col-sm-6 col-md-3')) }}


    <br>

    <div class="col-md-12">
    <br>
      <button type="submit" class="btn btn-success pull-left"><em class="fa fa-pencil-square-o "></em> CREATE NEW</button>
    </div>

    <div class="col-md-12">
    <br>
      <a href="{{ route('employee') }}" class="pull-left"><button type="button" class="btn btn-warning"><em class="fa fa-arrow-left"></em> Back</button></a>
    </div>

  {{ Form::close() }}
</div>


@stop
