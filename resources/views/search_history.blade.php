@extends('layouts.app') 

@section('content')
    <div class="container">
        <h2 class="text-center">Search History</h2>
        <hr>
        <div class="row">
     
        <div id="filters" class="col-4">
            <h3>Keywords:</h3>
            @foreach ($keywords as $keyword)
                <label>
                    <input type="checkbox" class="filter-checkbox keyword" value="{{ $keyword->search_keyword }}">
                    {{ $keyword->search_keyword }} ({{ $keyword->count }} times found)
                </label><br>
            @endforeach

            <h3>Users:</h3>
            @foreach ($users as $user)
                <label>
                    <input type="checkbox" class="filter-checkbox user" value="{{ $user->id }}">
                    {{ $user->name }}
                </label><br>
            @endforeach

            <h3>Time Range:</h3>
            <label><input type="checkbox" class="filter-checkbox time-range" value="yesterday">See data from yesterday</label><br>
            <label><input type="checkbox" class="filter-checkbox time-range" value="last_week">See data from last week</label><br>
            <label><input type="checkbox" class="filter-checkbox time-range" value="last_month">See data from last month</label><br>
        </div>

        <div id="results" class="col-8">
            <ul id="search-results">
                @foreach($searchHistory as $history)
                    <li data-keywords="{{ $history->search_keyword }}" data-user="{{ $history->user_id }}" data-time="{{ $history->search_time }}">
                        <strong>User:</strong> {{ $history->user->name }}<br>
                        <strong>Keyword:</strong> {{ $history->search_keyword }}<br>
                        <strong>Time:</strong> {{  $history->search_time }}<br>
                        <strong>Results:</strong> {{ $history->search_results }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="{{ asset('js/search-history.js') }}"></script> {{-- Include your JavaScript file --}}
@endsection
