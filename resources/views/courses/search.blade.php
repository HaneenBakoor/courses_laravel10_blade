<x-app-layout>
    
  
<center>
    
        <h1>Search Results</h1>

        @if ($courses->isEmpty())
            <p>No results found for "{{ $searchTerm }}"</p>
        @else
            <p>Showing {{ $courses->count() }} results for "{{ $searchTerm }}"</p>

            <ul>
                @foreach ($courses as $result)
                    <li>
                        <h3> Course Name is:</h3> {{ $result->name }}
                        <h3> The costs is: </h3>{{ $result->price}}

                    </li>
                @endforeach

            </ul>
        @endif
    </center>

</x-app-layout>


