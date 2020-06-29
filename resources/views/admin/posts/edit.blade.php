@extends('layouts.admin')

@section('content')
<section>
    <div class="container">
        <h1 class="mb-4">Post Editor</h1>
        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $post->title , old('title') }}">
            </div>
            <div class="form-group">
                <label for="body">Post</label>
                <textarea class="form-control" id="body" rows="20" name="body">{{ $post->body , old('body')  }}</textarea>
            </div>
            <div class="container">
                @foreach ($tags as $tag)
                    <div class="checkbox">
                        <input type="checkbox" name="tags[]" id="tag-{{ $loop->iteration }}" value="{{ $tag->id }}"
                        @if ($post->tags->contains($tag->id))
                            checked
                        @endif>
                        <label for="tag-{{ $loop->iteration }}">{{ $tag->name }}</label>
                    </div>
                @endforeach
            <input type="submit" value="Update">
        </form>
    </div>
</section>
@endsection