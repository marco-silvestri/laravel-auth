@foreach ($posts as $post)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $post->user_id }}</h6>
                <p class="card-text">{{ $post->body }}</p>
                <a href="{{ route('guest.posts.show', $post->id) }}" class="card-link">Read more...</a>
            </div>
        </div>
@endforeach