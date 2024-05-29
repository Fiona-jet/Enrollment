<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Detail</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/details.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>{{$course->name}}</h2>
            </div>
            <div class="card-body">
                <p class="card-text">{{$course->details}}</p>
            </div>
            <div class="card-footer text-muted">
                <h3>Price: {{$course->fee}} BDT</h3>
            </div>
            <div>
                @if (!in_array($course->id, $enrolledCourses))
                <button onclick="window.location='{{ route('checkout2', $course->id) }}'">Enroll Now</button>
                @endif
                @if (in_array($course->id, $enrolledCourses))
                <button>Enrolled</button>
                @endif
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>