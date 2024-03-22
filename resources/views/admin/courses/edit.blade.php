<x-app-layout>
    
<h2> Edit Course</h2>
<form action="{{ route('courses.update', $course->id) }}" method="POST">
    @csrf
    @method('PUT')
    Name:
    <input type="text" name="name" value="{{ $course->name }}"><br>
    Price:
    <input  type='text' name="price" value="{{ $course->price }}" ><br>
    <button type="submit">Update Course</button>
</form>
</x-app-layout>

