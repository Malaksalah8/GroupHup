@auth
    @php
        $user = auth()->user();
    @endphp

    <h1>Courses</h1>

    {{-- Instructor View --}}
    @if($user->role === 'instructor')

        <h2>Create Course</h2>

        <form method="POST" action="/courses/store">
            @csrf

            <input type="text" name="name" placeholder="Course Name">
            <input type="number" name="min_students" placeholder="Min Students">
            <input type="number" name="max_students" placeholder="Max Students">

            <button type="submit">Create Course</button>
        </form>

        <hr>

        <h2>All Courses</h2>

        @foreach($courses as $course)
            <h3>{{ $course->name }}</h3>
            <p>Students: {{ $course->users->count() }}</p>
            <hr>
        @endforeach

    @endif


    {{-- Student View --}}
    @if($user->role === 'student')

        <h2>My Courses</h2>

        @foreach($myCourses as $course)
            <h3>{{ $course->name }}</h3>
            <p>Joined </p>
            <hr>
        @endforeach

        <h2>Available Courses</h2>

        @foreach($availableCourses as $course)
            <h3>{{ $course->name }}</h3>

            <form method="POST" action="/courses/{{ $course->id }}/join">
                @csrf
                <button type="submit">Join</button>
            </form>

            <hr>
        @endforeach

    @endif

@else
    <h2>Please login first</h2>
@endauth