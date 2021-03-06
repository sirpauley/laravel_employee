<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">


	<title>{{ Route::currentRouteName() }}</title>
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('lib/medialoot/dist/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Icons -->
  <link href="{{ asset('lib/medialoot/css/font-awesome.css') }}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('lib/medialoot/css/style.css') }}" rel="stylesheet">

  <!-- DataTables CSS-->
  <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

  <!-- NOTY from https://ned.im/noty-->
  <link href="{{ asset('lib/noty.css') }}" rel="stylesheet">

</head>
<body>

  <div class="container-fluid" id="wrapper">
		<div class="row">

    <!-- MENU -->


    {{ $employeeActive    = '' }}
    {{ $statisticActive   = '' }}
    {{ $phoneBookActive   = '' }}
    {{ $reviewActive      = '' }}
    {{ $passwordActive    = '' }}

    @switch(Route::currentRouteName())

			@case('employee')
			@case('new employee')
			@case('employee details')
			@case('employee edit')
          {{ $employeeActive = 'active' }}
          @break

			@case('statistics')
          {{ $statisticActive = 'active' }}
          @break

			@case('phonebook')
			@case('phonebook details')
				{{ $phoneBookActive = 'active'}}
				@break

			@case('review')
			@case('comment')
				{{$reviewActive = 'active'}}
				@break
			@case('password')
			@case('password reset')
				{{ $passwordActive = 'active'}}
				@break
    @endswitch

    <nav class="sidebar col-xs-12 col-sm-4 col-lg-3 col-xl-2">
      <h1 class="site-title"><a href=" {{ URL::to('welcome') }} "><em class="fa fa-rocket"></em> SES</a></h1>

      <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><em class="fa fa-bars"></em></a>
      <ul class="nav nav-pills flex-column sidebar-nav">
        <li class="nav-item"><a class="nav-link {{ $employeeActive }}" href="{{ route('employee') }}"><em class="fa fa-user"></em> Employees <span class="sr-only">(current)</span></a></li>
        <li class="nav-item"><a class="nav-link {{$statisticActive}}" href="{{route('statistics')}}"><em class="fa fa-line-chart"></em> Statistics</a></li>
        <li class="nav-item"><a class="nav-link {{ $phoneBookActive }} " href="{{ route('phonebook') }}"><em class="fa fa-phone-square"></em> Phone book</a></li>
        <li class="nav-item"><a class="nav-link {{$reviewActive}}" href="{{ route('review') }}"><em class="fa fa-pencil-square-o"></em> Leave a review</a></li>

				@if (Auth::user()->admin_right == true)
					<li class="nav-item"><a class="nav-link {{ $passwordActive }} " href=" {{ route('password') }} "><em class="fa fa-clone"></em> Password</a></li>
				@endif

				<a href="{{ route('logout') }}" class="logout-button"><em class="fa fa-power-off"></em> Signout</a>
      </ul>
    </nav>

    <main class="col-xs-12 col-sm-8 col-lg-9 col-xl-10 pt-3 pl-4 ml-auto">

    <!-- HEADER -->
    <header class="page-header row justify-center">
      <div class="col-md-6 col-lg-8" >
        <h1 class="float-left text-center text-md-left">{{ strToUpper(Route::currentRouteName()) }}</h1>
      </div>

      <div class="dropdown user-dropdown col-md-6 col-lg-4 text-center text-md-right"><a class="btn btn-stripped dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <div class="username mt-1">
          <h4 class="mb-1">{{ Auth::user()->name}}</h4>

          @auth
          <h6 class="text-muted">
            @if (Auth::user()->admin_right == true)
              ADMIN
            @else
              EMPLOYEE
            @endif
          </h6>
          @endauth

        </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right" style="margin-right: 1.5rem;" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="{{ route('employee details', Auth::user()->id) }}"><em class="fa fa-user-circle mr-1"></em> View Profile</a>
            <a class="dropdown-item" href="{{ route('logout') }}"><em class="fa fa-power-off mr-1"></em>  Logout</a>
        </div>
      </div>
      <div class="clear"></div>
    </header>

      @yield('content')

    </main>

  </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src=" {{ asset('lib/medialoot/dist/js/bootstrap.min.js') }}"></script>

<!-- <script src="lib/medialoot/js/chart.min.js"></script>
<script src="lib/medialoot/js/chart-data.js"></script>
<script src="lib/medialoot/js/easypiechart.js"></script>
<script src="lib/medialoot/js/easypiechart-data.js"></script>-->
<script src="{{ asset('lib/medialoot/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('lib/medialoot/js/custom.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

<!-- Data table-->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<!-- <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script> -->

<!--noty from https://ned.im/noty-->
<script src="{{ asset('lib/noty.js') }}" type="text/javascript"></script>

<!--My function library for calling a standard noty function -->
<script src="{{ asset('lib/noty_function.js') }}" type="text/javascript"></script>

@if($hasTable)
	<script type="text/javascript">

		( function($) {
				// we can now rely on $ within the safety of our "bodyguard" function
				$('#employeeTable').DataTable();
		} ) ( jQuery );

	</script>
@endif

</body>
</html>
