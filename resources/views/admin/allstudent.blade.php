@extends('layout')
@section('content')


<div class="card">
  <div class="card-body">
    <h2 class="card-title">Data table</h2>

    @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
    @endif

    <div class="row">
      <div class="col-12">
        <table id="order-listing" class="table table-striped" style="width:100%;">
          <thead>
            <tr>
              <th>ST_Roll</th>
              <th>ST_Name</th>
              <th>Phone</th>
              <th>Image</th>
              <th>Address</th>
              <th>Department</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($all_student_info as $v_student)
            <tr>
              <td>{{$v_student->student_roll}}</td>
              <td>{{$v_student->student_name}}</td>
              <td>{{$v_student->student_phone}}</td>
              <td><img src="{{URL::to($v_student->student_image)}}" height="80" width="100" style="border-radius: 50%;"> </td>
              <td>{{$v_student->student_address}}</td>
              <td>

                @if ($v_student->student_department==1)

                <span class="label label-success">{{'CSE'}}</span>
                @elseif ($v_student->student_department==2)
                <span class="label label-primary">{{'BBA'}}</span>
                @elseif ($v_student->student_department==3)
                <span class="label label-warning">{{'EEE'}}</span>
                @elseif ($v_student->student_department==4)
                <span class="label label-info">{{'ECE'}}</span>
                @else
                <span class="label label-important">{{'Not Defined'}}</span>
                @endif
              </td>

              <td>
                <a href="{{URL::to('/student_view/'.$v_student->student_id)}}"><button class="btn btn-outline-primary">View</button></a>
                <a href="{{URL::to('/student_edit/'.$v_student->student_id)}}"><button class="btn btn-outline-warning">Edit</button></a>
                <a href="{{URL::to('/student_delete/'.$v_student->student_id)}}" id="delete"><button class="btn btn-outline-danger">Delete</button></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection