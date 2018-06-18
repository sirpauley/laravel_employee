@extends('layouts.standard_layout', ['hasTable' => false])

@section('content')

<!-- Collor array define for cards-->
@php ($colorArray = ['text-white bg-primary mb-3',
    'text-white bg-secondary',
    'text-white bg-success',
    'text-white bg-danger',
    'text-white bg-warning',
    'text-white bg-info',
    'bg-light',
    'text-white bg-dark'])

<!-- today's date -->
@php($today = date("dm"))

<h2>UPCOMMING BIRTHDAYS</h2>

<!--Birthday cards-->
@php($key = 0)
@foreach($birthdays as $birthday)

  @if($key == 0)
    <div class='row'>
  @endif

  @if( \Carbon\Carbon::parse($birthday->birthday)->format('dm') == $today)

    <div class='col-sx-12 col-md-4'>
      <div class="card md-3 {{$colorArray[3]}}" >
        <h5 class='card-header'>{{ \Carbon\Carbon::parse($birthday->birthday)->format('d/m/Y') }} </h5>
        <div class='card-body'>
          <h5 class='card-title'> Happy birthday: {{$birthday->name}}</h5>
          <p class='card-text'>TELEPHONE: {{$birthday->tell}}</p>
          <p class='card-text'>EMAIL: {{$birthday->email}}</p>
        </div>
      </div>
    </div>

  @else

    <div class='col-sx-12 col-md-4'>
      <div class="card md-3 {{$colorArray[1]}}" >
        <h5 class='card-header'>{{ \Carbon\Carbon::parse($birthday->birthday)->format('d/m/Y') }}</h5>
        <div class='card-body'>
          <h5 class='card-title'> EMPLOYEE NAME: {{$birthday->name}}</h5>
          <p class='card-text'>TELEPHONE: {{$birthday->tell}}</p>
          <p class='card-text'>EMAIL: {{$birthday->email}}</p>
        </div>
      </div>
    </div>

  @endif

  @if(($key+1)%3 == 0)
    </div>
    <div class='row'>
  @endif

  @php($key++)

@endforeach
  </div>

  <br>

  <h1> Some statistics</h1>
  <div class='row'>

    <!-- Total employees -->
    <div class="col-sx-12 col-md-4">
			<div class="card md-12 {{$colorArray[5]}}" >
				<h5 class="card-header">Total employees </h5>
				<div class="card-body">
						<p class="card-text"><h1>{{$totalEmployees}}</h1></p>
						</div>
			</div>
		</div>

    <!-- Total Comments-->
    <div class="col-sx-12 col-md-4">
			<div class="card md-12 {{$colorArray[5]}}" >
				<h5 class='card-header'>Total REVIEWS</h5>
				<div class='card-body'>
						<p class='card-text'><h1>{{$totalComments}}</h1></p>
						</div>
			</div>
		</div>

<!-- Total likes-->
    <div class='col-sx-12 col-md-4'>
				<div class='card md-12 {{$colorArray[5]}}' >
					<h5 class='card-header'>Total LIKES</h5>
					<div class='card-body'>
							<p class='card-text'><h1>{{$totalLikes}}</h1></p>
							</div>
				</div>
			</div>

</div>

<br>

  <!-- Top 10 liked employees-->
<div class="row">
  <div class='col-sx-12 col-md-4'>
    <div class='card md-12 {{$colorArray[5]}}' >
      <h5 class='card-header'>TOP 10 LIKED</h5>
      <div class='card-body'>
        <h5 class='card-title'> EMPLOYEES</h5>
        @foreach($topTenList as $key => $person)
        <p class='card-text'>{{$key+1}} . LIKES ({{$person['likes']}}) - {{$person['name']}}</p>
        @endforeach
      </div>
    </div>
  </div>
</div>


<br>

@stop
