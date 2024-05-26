@extends('layout')
@section('content')

<div class="col-12 col-lg-6 grid-margin">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">ADD TEACHERS</h2>

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif


            <form action="{{route('save-teacher')}}" class="forms-sample" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Teacher Name</label>
                    <input type="text" name="name" class="form-control p-input" aria-describedby="emailHelp" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Phone</label>
                    <input type="text" class="form-control p-input" name="phone" placeholder="Enter Phone">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Teacher Email</label>
                    <input type="email" name="email" id="email" class="form-control p-input" aria-describedby="emailHelp" placeholder="Enter E-mail">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Teacher Address</label>
                    <input type="text" class="form-control p-input" name="address" placeholder="Enter Address">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Photo</label>
                    <input type="file" class="form-control p-input" name="address">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Teacher Department</label>
                    <input type="text" class="form-control p-input" name="department" placeholder="Enter Department">
                </div>
                <button type="submit" class="btn btn-success btn-block">Add Teacher</button>
            </form>
        </div>
    </div>
</div>
@endsection