@extends('layouts.standard_layout', ['hasTable' => false])

@section('content')

<h3>PLEASE LEAVE A POSITIVE MESSAGE FOR <em> {{$employee->name}}</em></h3>

@if(Session::has('msg'))
<div class="container">
<div class="row">
  <div class="col-4 alert">
      <div class="alert alert-success"><p>{{Session::get('msg')}}</p></div>
  </div>
</div>

</div>
@endif

<!-- FORM FOR NEW COMMENT-->
{{ Form::open(array('route' => 'Postcomment')) }}
    {{ csrf_field() }}

<div class="container">

      <div class="form-group">
        {{ Form::label('message', 'REVIEW: ') }}
        {{ Form::textarea('message', null, ['size' => '30x5', 'class' => 'form-control col-12']) }}

        <input type="hidden" name="employee_id" value=" {{  $id }} ">
      </div>

</div>


<br>

<div class="row col-12">
  <button type="submit" class="pull-left col-6 col-md-2 btn btn-success "><em class="fa fa-check"></em>SAVE MESSAGE</button>

  <div class="col-3"><a href="{{route('review')}}" class="pull-left "><button type="button" class="btn btn-warning"><em class="fa fa-arrow-left"></em> Back</button></a></div>
</div>

{{ Form::close() }}

<!-- COMMENT CARD -->

<br>
<br>

<div class="container" >

  @php ($colorArray = ['text-white bg-primary mb-3',
      'text-white bg-secondary',
      'text-white bg-success',
      'text-white bg-danger',
      'text-white bg-warning',
      'text-white bg-info',
      'bg-light',
      'text-white bg-dark'])

  @foreach($comments as $key => $value)

    @php ($randomNum = rand(0, 7))

    @if($key == 0)
      <div class='row'>
    @endif


    <div class="col-sx-12 col-md-4">
      <div class="card md-3 {{$colorArray[$randomNum]}}" >
        <h5 class='card-header'>{{ \Carbon\Carbon::parse($value->created)->format('Y-m-d') }} </h5>
        <div class='card-body'>
        <h5 class='card-title'> {{ $employeesByID[$value['reviewer_id']] }} </h5>
          <p class='card-text'>{{$value->comment}}</p>
        </div>
      </div>
    </div>


    @if(($key+1)%3 == 0 )
      </div>
      <br>
      <div class='row'>
    @endif


  @endforeach

  </div>
  <br>



</div>

@stop
