@extends('layouts.app')

@section('title-block')
    Posts
@endsection

@section('content')
    <h1>Posts</h1>

    <form action="{{ route('post-form') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Enter a name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="post">Post</label>
            <textarea name="post" id="post" placeholder="Enter a post" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Send</button>
    </form>
@endsection
