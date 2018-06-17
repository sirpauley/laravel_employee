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


    <div class="table table-sm table-responsive">
      <table id="employeeTable" class="display table table-striped">
        <thead>


          <tr>
            <th>RESET</th>
            <th>NAME</th>
            <th>USERNAME</th>
            <th>TELEPHONE</th>
            <th>EMAIL</th>
            <th>EMPLOYED DATE</th>
          </tr>
        </thead>
        <tbody>

          <!-- Employees data -->
          @if(!empty($employees))
            @foreach($employees as $employee)

               <tr>

                 <td>
                   @if(Auth::user()->admin_right == 1)
                   <a href="{{ route('password reset', $employee->id) }}"><button class='btn btn-circle btn-warning'><em class='fa fa-pencil-square-o'></em></button></a>
                   @endif
                 </td>

                 <td>{{$employee->name}}</td>
                 <td>{{$employee->username}}</td>
                 <td>{{$employee->tell}}</td>
                 <td>{{ $employee->email }}</td>
                 <td>{{ \Carbon\Carbon::parse($employee->birthday)->format('d/m/Y') }}</td>

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
