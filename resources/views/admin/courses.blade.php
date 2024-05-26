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
                            <th>Course Name</th>
                            <th>Course Fee</th>
                            <th>Teacher</th>
                            <th>Teacher Fee</th>
                            <th>Total Class</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                        <tr>
                            <td>{{$course->name}}</td>
                            <td>{{$course->fee}}</td>
                            <td>{{$course->teacher->name}}</td>
                            <td>{{$course->teacher_fee}}</td>
                            <td>{{$course->totalclass}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection