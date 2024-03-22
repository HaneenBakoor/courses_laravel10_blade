<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>
  
    <form action="{{ route('courses.search') }}" method="post">
        @csrf
        <input type="text" name="search" placeholder="Search for a course">
        <button type="submit">Search</button>
    </form>
    <br><br>
    <a href ={{route('courses.create') }}> Create Course </a>
    <br><br>
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
                    <a href="{{ route('courses.edit',$course->id) }}">Edit</a><br>
                    <form method="POST" action="{{ route('courses.destroy', $course->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete Course</button>
                    </form>

                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</x-app-layout>

