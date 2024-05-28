<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>
<body>
    <div class="container">
        <h2>User Profile</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->student->name }}"  >
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->student->email }}" readonly >
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ auth()->user()->student->phone }}"  >
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ auth()->user()->student->address }}"  >
            </div>
            <div class="form-group">
                <label for="image">Profile Image:</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="form-group">
                <label for="address">Roll:</label>
                <input type="text" class="form-control" id="roll" name="roll" value="{{ auth()->user()->student->roll }}"  >
            </div>
            <div class="form-group">
                <label for="fathername">Father Name:</label>
                <input type="text" class="form-control" id="fathername" name="fathername" value="{{ auth()->user()->student->fathername }}"  >
            </div>
            <div class="form-group">
                <label for="mothername">Mother Name:</label>
                <input type="text" class="form-control" id="mothername" name="mothername" value="{{ auth()->user()->student->mothername }}"  >
            </div>
            <div class="form-group">
                <label for="department">Department:</label>
                <input type="text" class="form-control" id="department" name="department" value="{{ auth()->user()->student->department }}"  >
            </div>
            <div class="form-group">
                <label for="admissionyear">Admission Year:</label>
                <input type="text" class="form-control" id="admissionyear" name="admissionyear" value="{{ auth()->user()->student->admissionyear }}"  >
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
