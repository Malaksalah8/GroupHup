@auth
    @php
        $user = auth()->user();
    @endphp

    <h1>Courses</h1>

    {{-- Create Course (Instructor only) --}}
    @if(trim(strtolower($user->role)) === 'instructor')
        <form method="POST" action="/courses/store">
            @csrf

            <input type="text" name="name" placeholder="Course Name">
            <input type="number" name="min_students" placeholder="Min Students">
            <input type="number" name="max_students" placeholder="Max Students">

            <button type="submit">Create Course</button>
        </form>
    @endif

    <hr>

    {{-- Courses List --}}
    @foreach($courses as $course)

        <h3>{{ $course->name }}</h3>

        {{-- Students Count (only for instructor) --}}
        @if(trim(strtolower($user->role)) === 'instructor')
            <p>Students: {{ $course->users->count() }}</p>
        @endif

        {{-- Join Button (only for student) --}}
        @if(trim(strtolower($user->role)) === 'student')
            <form method="POST" action="/courses/{{ $course->id }}/join">
                @csrf
                <button type="submit">Join</button>
            </form>
        @endif

        <hr>

    @endforeach

@else
    <h2>Please login first</h2>
@endauth