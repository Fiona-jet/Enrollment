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
                            <th>Student Roll</th>
                            <th>Conducted By</th>
                            <th>Tuition Fee</th>
                            <th>Revenue</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($enrollments as $enrollment)
                        <tr>
                            <td>{{$enrollment->course->name}}</td>
                            <td>{{$enrollment->student->roll}}</td>
                            <td>{{$enrollment->course->teacher->name}}</td>
                            <td>{{$enrollment->tuition_fee}}</td>
                            <td>{{$enrollment->revenue}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection