@extends('layout')
@section('content')

<div class="col-12 col-lg-6 grid-margin">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">ADD Courses</h2>

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif


            <form class="forms-sample" method="POST" action="{{route('save-course')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Course Name</label>
                    <input type="text" name="name" class="form-control p-input" aria-describedby="emailHelp" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Details</label>
                    <input type="text" class="form-control p-input" name="details" placeholder="Enter Details">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Fee</label>
                    <input type="number" class="form-control p-input" name="fee" placeholder="Enter Fee">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Teacher Fee</label>
                    <input type="number" class="form-control p-input" name="teacher_fee" placeholder="Enter Fee">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Total Class</label>
                    <input type="number" class="form-control p-input" name="totalclass" placeholder="Total Class">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" class="form-control p-input" name="image">
                </div>
                <div class="form-group
                    <label for="exampleInputPassword1">Teacher</label>
                    <select class="form-control p-input" name="teacher_id">
                        @foreach($teachers as $teacher)
                        <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success btn-block">Add Course</button>
            </form>
        </div>
    </div>
</div>
@endsection