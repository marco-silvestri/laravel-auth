@extends('layouts.admin')

@section('content')
<section>
    <div class="container">
        <h1 class="mb-4">Create new post</h1>
        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $post->title , old('title') }}">
            </div>
            <div class="form-group">
                <label for="body">Post</label>
                <textarea class="form-control" id="body" rows="20" name="body">{{ $post->body , old('body')  }}</textarea>
            </div>
        </form>
        <input type="submit" value="Update">
    </div>
</section>
@endsection