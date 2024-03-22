<x-app-layout>
    
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Admin Dashboard') }}
      </h2>
  </x-slot>
<form action="{{ route('courses.store') }}" method="post">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="price">Price:</label>
    <input id="" name="price" required><br>

    <input type="submit" value="Create Course">
  </form>
</x-app-layout>
