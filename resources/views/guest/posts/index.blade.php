@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Archive</h1>
        @include('guest.posts.partials.results')
    </div>

    {{ $posts->links() }}
@endsection

