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
            </tr>
          </thead>
          <tbody>
            @foreach($all_student_info as $v_student)
            <tr>
              <td>{{$v_student->roll}}</td>
              <td>{{$v_student->name}}</td>
              <td>{{$v_student->phone}}</td>
              <td><img src="{{ asset('uploads/students/' . $v_student->image) }}" alt="Student Photo" height="80" width="100" style="border-radius: 50%;"> </td>
              <td>{{$v_student->address}}</td>
              <td>{{$v_student->department}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection