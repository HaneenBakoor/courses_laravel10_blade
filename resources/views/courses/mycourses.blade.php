<x-app-layout>
<h1> My Courses:</h1>
    <table>
        <thead>
            <tr>
                <th><h4>Course_Name</h4></th>
                {{--  <th><h4>Price</h4></th>  --}}
                {{--  <th><h4> Action</h4></th>  --}}


            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)

                <tr>
                    <td>{{$course->name}}</td>
                    {{--  <td>{{ $course->price }}</td>  --}}


                </tr>
            @endforeach

        </tbody>
    </table>


</x-app-layout>
