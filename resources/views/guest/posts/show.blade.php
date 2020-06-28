@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($post as $item)
        <h1 class="mb-4">Details of: {{ $item->title }}</h1>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $item->title }} (last updated: {{ $item->updated_at }})</h5>
                <h6 class="card-subtitle mb-2 text-muted">Original author: {{ $item->user_id }}</h6>
                <p class="card-text">{{ $item->body }}</p>
            </div>
        </div>
    </div>
    @endforeach
@endsection