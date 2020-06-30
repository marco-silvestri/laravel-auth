@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <h1 class="mb-4">Create new post</h1>
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">{{-- enctype handles the types of data --}}
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" value="Title..." name="title" placeholder="Title..." value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="body">Post</label>
                <textarea class="form-control" id="body" rows="20" name="body" placeholder="Write your post" value="{{ old('body') }}"></textarea>
            </div>
            <div class="form-group">
                <label for="path_img">Featured image</label>
                <input class="form-control" type="file" name="path_img" id="path_img" accept="image/*">
            </div>
            <input type="submit" value="Update">
        </form>
    </div>
</section>
@endsection