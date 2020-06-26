@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Details of: {{ $post[0]->title }}</h1>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $post[0]->title }} (last updated: {{ $post[0]->updated_at }})</h5>
                <h6 class="card-subtitle mb-2 text-muted">Original author: {{ $post[0]->user_id }}</h6>
                <p class="card-text">{{ $post[0]->body }}</p>
                <a href="{{ route('admin.posts.edit', $post[0]->id) }}" class="card-link">Edit</a>
                <form action="{{ route('admin.posts.destroy', $post[0]->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input class="button is-danger is-small" type="submit" value="Delete">
                </form>
            </div>
        </div>
    </div>
@endsection