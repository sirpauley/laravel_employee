@extends('layouts.standard_layout', ['hasTable' => true])

@section('content')


    <div class="table table-sm table-responsive">
      <table id="employeeTable" class="display table table-striped">
        <thead>


          <tr>
            <th>CONTROL</th>
            <th>NAME</th>
            <th>USERNAME</th>
            <th>TELEPHONE</th>
            <th>EMAIL</th>
            <th>BIRTHDAY</th>
          </tr>
        </thead>
        <tbody>

          <!-- Employees data -->
          @if(!empty($employees))
            @foreach($employees as $employee)

               <tr>

                 <td>
                   <a href="{{ route('phonebook details', $employee->id) }}"><button class='btn btn-circle btn-info'><em class='fa fa-info-circle'></em></button></a>
                 </td>

                 <td>{{$employee->name}}</td>
                 <td>{{$employee->username}}</td>
                 <td>{{$employee->tell}}</td>
                 <td>{{$employee->email}}</td>
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
