@extends('layouts.app')

@section('title-block')
    {{$data->name}}
@endsection

@section('content')
<h1>{{$data->name}}</h1>
<div class="alert bg-info bg-gradient">
    <p>{{ $data->post }}</p>
    <p><small>{{ $data->created_at }}</small></p>
    <a href="{{route('post-update', $data->id)}}"><button class="btn btn-warning">Edit</button></a>
    <a href="{{route('product-data-one', $data->id)}}"><button class="btn btn-danger">Delete</button></a>
</div>
@endsection