@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Details of: {{ $post->title }}</h1>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }} (last updated: {{ $post->updated_at }})</h5>
                <h6 class="card-subtitle mb-2 text-muted">Original author: {{ $post->user->name }}</h6>
                <p class="card-text">{{ $post->body }}</p>
            </div>
        </div>
        @foreach ($post->comments as $comment)
            <p>Comment {{ $loop->iteration }}</p>
            <p>{{ $comment->title }}</p>
            <p>{{ $comment->body }}</p>
        @endforeach
    </div>
@endsection