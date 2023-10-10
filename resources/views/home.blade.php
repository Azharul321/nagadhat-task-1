@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('search') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search..." name="keyword">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </div>
    </form>
</div>
@endsection
