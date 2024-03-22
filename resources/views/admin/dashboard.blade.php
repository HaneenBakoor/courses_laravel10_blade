<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="button-container">
                               
                                <a href={{route('users.index')}} ><button class="btn btn-primary">All Students</button></a><br><br>
                                <a href={{route('courses.index')}} ><button class="btn btn-primary">All Courses</button></a><br><br>
                                <a href={{route('users.noCourses')}} ><button class="btn btn-primary">Students With No Courses</button></a><br><br>
                                <a href={{route('usercourse')}} ><button class="btn btn-primary">Students with Courses</button></a> <br><br>
                                <a href={{route('usercourses')}}> <button class="btn btn-primary">Students with more than one Course </button></a><br><br>
                                <a href={{route('usercourseprice')}}> <button class="btn btn-primary">Students paid > 1000</button></a><br><br>
                            </div>
                        </div>
                    </div>
                   
              
</x-app-layout>
