@extends('layouts.standard_layout', ['hasTable' => true])

@section('content')


  @if(Session::has('msg'))
  <div class="container">
  <div class="row">
    <div class="col-4 alert">
        <div class="alert alert-success"><p>{{Session::get('msg')}}</p></div>
    </div>
  </div>

  </div>
  @endif

<div class="card mb-4">
  <div class="card-block">

    <!-- Button to Open the Modal -->
    <a href="{{ route('new employee') }}"><button class="btn btn-sm btn-success pull-left" type="button"><em class="fa fa-user"></em> ADD NEW EMPLOYEE</button></a>
  </div>
</div>

    <div class="table table-sm table-responsive">
      <table id="employeeTable" class="display table table-striped">
        <thead>


          <tr>
            <th>CONTROL</th>
            <th>NAME</th>
            <th>USERNAME</th>
            <th>EMPLOYED DATE</th>
            <th>BIRTHDAY</th>
            <th>TELEPHONE</th>
            <th>ADMIN</th>
          </tr>
        </thead>
        <tbody>

          <!-- Employees data -->
          @if(!empty($employees))
            @foreach($employees as $employee)

               <tr>

                 <td>
                   @if(Auth::user()->admin_right == 1)
                   <a href="{{ route('employee edit', $employee->id) }}"><button class='btn btn-circle btn-warning'><em class='fa fa-pencil-square-o'></em></button></a>
                   @endif
                   <a href="{{ route('employee details', $employee->id) }}"><button class='btn btn-circle btn-info'><em class='fa fa-info-circle'></em></button></a>
                 </td>

                 <td>{{$employee->name}}</td>
                 <td>{{$employee->username}}</td>
                 <td>{{ \Carbon\Carbon::parse($employee->birthday)->format('d/m/Y') }}</td>
                 <td>{{ \Carbon\Carbon::parse($employee->created)->format('d/m/Y')}}</td>
                 <td>{{$employee->tell}}</td>

                 @if($employee->admin_right == 1)
                    <td>YES</td>
                 @else
                    <td>NO</td>
                 @endif

               </tr>

            @endforeach
          @else
            <tr>
              <td>NULL</td>
              <td>NULL</td>
              <td>NULL</td>
              <td>NULL</td>
              <td>NULL</td>
              <td>NULL</td>
              <td>NULL</td>
            </tr>
          @endif

        </tbody>
      </table>
    </div><!-- table div -->

  </div>
</div>


@stop
