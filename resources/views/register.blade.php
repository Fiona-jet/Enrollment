<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="{{asset('css/register.css')}}">
</head>

<body>
    <div class="form-container">
        <form action="{{ route('registerPost') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="input-group">
                <label for="roll">Roll Number</label>
                <input type="text" id="roll" name="roll" required>
            </div>
            <div class="input-group">
                <label for="fathername">Father's Name</label>
                <input type="text" id="fathername" name="fathername" required>
            </div>
            <div class="input-group">
                <label for="mothername">Mother's Name</label>
                <input type="text" id="mothername" name="mothername" required>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" required>
            </div>
            <div class="input-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="input-group">
                <label for="image">Upload Image</label>
                <input type="file" id="image" name="image" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="department">Department</label>
                <input type="text" id="department" name="department" required>
            </div>
            <div class="input-group">
                <label for="admissionyear">Admission Year</label>
                <input type="text" id="admissionyear" name="admissionyear" required>
            </div>
            <button type="submit">Register</button>
        </form>
    </div>
</body>

</html>