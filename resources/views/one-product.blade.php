@extends('layouts.app')

@section('title-block')
    {{$data->title}}
@endsection

@section('content')
<h1>{{$data->title}}</h1>
<div class="">

    <div class="" style="width: 18rem;">
        <img src="{{ $data->image }}" class="img-fluid" alt="{{ $data->title }}">
        <div class="">
          <h5 class="">{{ $data->title }}</h5>
          <p class="">{{ $data->description }}</p>
          <p class="">{{ $data->price }} USD</p>
        </div>
      </div>
   
</div>
@endsection
