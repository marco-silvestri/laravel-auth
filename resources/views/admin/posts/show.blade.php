@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Details of: {{ $post->title }}</h1>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }} (last updated: {{ $post->updated_at }})</h5>
                <h6 class="card-subtitle mb-2 text-muted">Original author: {{ $post->user_id }}</h6>
                <p class="card-text">{{ $post->body }}</p>
                @forelse ($post->tags as $tag)
                <div class="content has-text-left">{{ $tag->name }}</div>
                @empty
                <div class="content has-text-left">No related tags</div>
                @endforelse
                <a href="{{ route('admin.posts.edit', $post->id) }}" class="card-link">Edit</a>
                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input class="button is-danger is-small" type="submit" value="Delete">
                </form>
            </div>
        </div>
    </div>
@endsection