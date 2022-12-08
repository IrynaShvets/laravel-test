@extends('layouts.admin')

@section('content')
<h1>All posts</h1>
<div class="d-flex flex-wrap">
    @foreach ($posts as $post)
        <div class="card m-2 bg-primary bg-gradient" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $post->name }}</h5>
                <h6 class="card-text">{{ $post->created_at }}</h6>
                <p class="card-text">{{ $post->post }}</p>
                <a href="{{ route('post-data-one', $post->id) }}" class="card-link text-danger">Post link</a>
            </div>
        </div>
    @endforeach

    <div class="mt-3">
        {{ $posts->withQueryString()->links() }}
    </div>
</div>
@endsection
