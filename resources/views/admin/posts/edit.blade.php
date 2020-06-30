@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <h1 class="mb-4">Post Editor</h1>
        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
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
            </div>
                <div class="form-group">
                    <label for="path_img">Featured image</label>
                    @isset ($post->path_img)
                    <img src="{{ asset('storage/' . $post->path_img) }}" alt="{{ $post->title }}">
                    <h6>Change</h6>
                    @endisset
                    <input class="form-control" type="file" name="path_img" id="path_img" accept="image/*">
                </div>
            <input type="submit" value="Update">
        </form>
    </div>
</section>
@endsection