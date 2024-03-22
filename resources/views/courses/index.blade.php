<x-app-layout>


    <form action="{{ route('courses.search') }}" method="post">
        @csrf
        <input type="text" name="search" placeholder="Search for a course">
        <button type="submit">Search</button>
    </form>
    <a href="{{ route('mycourses',Auth::user()->id) }}">Mycourses</a><br>

    <h1> All Courses:</h1>
    <table>
        <thead>
            <tr>
                <th><h4>Course_Name</h4></th>
                <th><h4>Price</h4></th>
                <th><h4> Action</h4></th>


            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)

                <tr>
                    <td>{{$course->name}}</td>
                    <td>{{ $course->price }}</td>
                    <td>

                     <form action="{{ route('courses.register', $course->id) }}" method="POST">
                        @csrf
                        <button type="submit">Register</button>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </form>

                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</x-app-layout>

