@extends('layouts.app') 

@section('content')
    <div class="container">
        <h2>Search Results for "{{ $searchKeyword }}"</h2>
        <hr>
        @if(count($searchResults) > 0)
            <ul>
                @foreach($searchResults as $result)
                    <li>
                        <h3>{{ $result->name }}</h3>
                        <p><a href="mailto:{{ $result->email}}">{{ $result->email}}</a></p>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No results found.</p>
        @endif
    </div>
@endsection
