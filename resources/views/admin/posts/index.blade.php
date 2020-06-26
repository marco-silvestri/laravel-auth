@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Post Manager</h1>
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th>ID:</th>
                    <th>Title:</th>
                    <th>Body:</th>
                    <th>Author:</th>
                    <th>Created:</th>
                    <th>Last update:</th>
                    <th colspan="3"></th>
                </tr>
            </thead>
            <tbody>
    @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
                    <td>{{ $post->user_id }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->updated_at }}</td>
                    <td>
                        <a href="{{ route('admin.posts.show', $post->id) }}">Read more</a>
                    </td>
                    <td>
                        <a href="{{ route('admin.posts.edit', $post->id) }}">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
    @endforeach
            </tbody>
            </table>
    </div>
    {{ $posts->links() }}
@endsection


