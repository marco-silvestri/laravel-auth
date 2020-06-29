@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Post Manager</h1>
        @include('admin.posts.partials.results')
    </div>
    {{ $posts->links() }}
@endsection


