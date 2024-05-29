<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Enrollment</title>
  <link rel="stylesheet" href="{{asset('css/home.css')}}">
</head>

<body>
  <header>
    <div class="logo">
      <h1>Enrollment</h1>
    </div>
    <nav>
      <ul>
        <li><a href="{{route('viewprofile')}}">{{auth()->user()->name}}</a></li>
        <li><a href="{{route('learnings')}}">My Courses</a></li>
        <li><a href="{{route('logout')}}">Logout</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section class="featured-courses">
      <h1>Featured Courses</h1>
      <div class="courses-container">
        @foreach ($courses as $course )
        <div class="course">
          <img src="{{ asset('uploads/courses/' . $course->image) }}" alt="Image" style="width: 100px; height: 100px;">
          <h2>{{$course->name}}</h2>
          <p>Teacher: {{$course->teacher->name}}</p>
          <p>Price: {{$course->fee}}</p>
          <a href="{{route('details', $course->id)}}">Details</a>
          <button onclick="window.location='{{route('checkout2',$course->id)}}'">Enroll Now</button>
        </div>
        @endforeach
    </section>
  </main>


  <footer>
    <p>Copyright © 2024 Enrollment</p>
  </footer>

  <script src="scripts.js"></script>
</body>

</html>