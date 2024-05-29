<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrolled Courses</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional Bootstrap JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">My Enrolled Courses</h2>
        <div class="accordion" id="coursesAccordion">
            @forelse ($enrollments as $index => $enrollment)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{ $index }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="false" aria-controls="collapse{{ $index }}">
                            {{ $enrollment->course->name }}
                        </button>
                    </h2>
                    <div id="collapse{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $index }}" data-bs-parent="#coursesAccordion">
                        <div class="accordion-body">
                            <strong>Description:</strong> {{ $enrollment->course->details }}<br>
                            <strong>Fee:</strong> {{ $enrollment->course->fee }}<br>
                            <strong>Teacher:</strong> {{ $enrollment->course->teacher->name ?? 'N/A' }}<br>
                            <a href="{{ route('details', $enrollment->course->id) }}" class="btn btn-primary mt-2">View Details</a>
                        </div>
                    </div>
                </div>
            @empty
                <p>You are not enrolled in any courses.</p>
            @endforelse
        </div>
    </div>
</body>
</html>
