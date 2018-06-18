@extends('layouts.standard_layout', ['hasTable' => true])

@section('content')


    <div class="table table-sm table-responsive">
      <table id="employeeTable" class="display table table-striped">
        <thead>


          <tr>
            <th>LIKE</th>
            <th>REVIEW</th>
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
                 @if($employee->liked)
                  <td><a href="{{route('unlike', $employee->id)}}"><button class='btn btn-circle btn-primary'><em class='fa fa-thumbs-o-up'></em></button></td></a>
                 @else
                  <td><a href="{{route('like', $employee->id)}}"><button class='btn btn-circle btn-secondary'><em class='fa fa-thumbs-o-up'></em></button></a></td>
                 @endif
                <td>
                  <a href="{{route('comment', $employee->id ) }}" ><button class='btn btn-circle btn-success'><em class='fa fa fa-comments'></em></button></a>
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
