<x-app-layout>
    
<h2> Edit User</h2>
<form action="{{ route('students.update', $student->id) }}" method="POST">
    @csrf
    @method('PUT')
    Name:
    <input type="text" name="name" value="{{ $student->name }}"><br>
    Email:
    <input  type='text' name="email" value="{{ $student->email }}" ><br>

    <button type="submit">Update User</button>
</form>
</x-app-layout>

