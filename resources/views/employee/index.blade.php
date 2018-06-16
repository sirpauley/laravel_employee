@extends('layouts.standard_layout')

@section('content')
<!-- Code body from here -->

    <div class="table table-sm table-responsive">
      <table id="employeeTable" class="display table table-striped">
        <thead>
          <tr>
            <th>NAME</th>
            <th>SURNAME</th>
            <th>EMPLOYED DATE</th>
            <th>BIRTHDAY</th>
            <th>TELEPHONE</th>
            <th>ADMIN</th>
            <th>CONTROL</th>
          </tr>
        </thead>
        <tbody>

          <!-- Employees data -->
          @if(!empty($employees))
            @foreach($employees as $employee)

               <tr>
                 <td>{{$employee->name}}</td>
                 <td>{{$employee->username}}</td>
                 <td>{{$employee->created}}</td>
                 <td>{{$employee->birthday}}</td>
                 <td>{{$employee->tell}}</td>

                 @if($employee->admin_right == 1)
                    <td>YES</td>
                 @else
                    <td>NO</td>
                 @endif
                 <td>
                   <a href="{{ URL::to('employee.edit', $employee->id) }}"><button class='btn btn-circle btn-warning'><em class='fa fa-pencil-square-o'></em></button></a>
                   <a href="{{ URL::to('employee.detail', $employee->id) }}"><button class='btn btn-circle btn-info'><em class='fa fa-info-circle'></em></button></a>
                 </td>
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

@endsection
