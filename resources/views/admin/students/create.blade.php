<x-app-layout>
    
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Admin Dashboard') }}
      </h2>
  </x-slot>
<form action="{{ route('students.store') }}" method="post">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="email">Email:</label>
    <input id="" name="email" required><br>

    <label for="password">Password:</label>
    <input id="" name="password" required><br>

    <input type="submit" value="Create User">
  </form>
</x-app-layout>
