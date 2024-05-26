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
                            <th>Teachers_Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Image</th>
                            <th>Department</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($teachers as $v_teacher)
                        <tr>
                            <td>{{$v_teacher->name}}</td>
                            <td>{{$v_teacher->phone}}</td>
                            <td>{{$v_teacher->email}}</td>
                            <td>{{$v_teacher->address}}</td>
                            <td><img src="{{ asset('uploads/teachers/' . $v_teacher->image) }}" height="80" width="100" style="border-radius: 50%;"></td>
                            <td>{{$v_teacher->department}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection