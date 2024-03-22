<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>
<div class="container">
    <div class="row justify-content-center">
        <div class="button-container">

            <br><br>
            <a href ={{route('students.create') }}> Create User </a>
            <br><br>
            <h2>All Students</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td><a href ={{route('students.edit',$student->id)}}><button>edit</button> </a></td>
                            <td>
                            <form method="POST" action="{{ route('students.destroy', $student->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete Student</button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</x-app-layout>