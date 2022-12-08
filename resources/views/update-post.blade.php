@extends('layouts.app')

@section('title-block')
    Update post
@endsection

@section('content')
<h1>Update post</h1>

<form action="{{ route('post-update-submit', $data->id) }}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" placeholder="Enter a name" id="name" value="{{$data->name}}" class="form-control">
    </div>
    <div class="form-group">
        <label for="post">Post</label>
        <textarea name="post" id="post" placeholder="Enter a post" class="form-control">{{$data->post}}</textarea>
    </div>
    <button type="submit" class="btn btn-success">Edit</button>
</form>
@endsection