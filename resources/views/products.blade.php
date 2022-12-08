@extends('layouts.app')

@section('title-block')
    All products
@endsection

@section('content')
    <h1>All products</h1>
    <div class="d-flex flex-wrap">
        @foreach ($products as $product)
        <div class="card m-3" style="width: 18rem;">
            <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->title }}">
            <div class="card-body">
              <h5 class="card-title">{{ $product->title }}</h5>
              <p class="card-text">{{ $product->description }}</p>
              <p class="card-text">{{ $product->price }} USD</p>
              <a href="{{ route('product-data-one', $product->id) }}"><button class="btn btn-warning">Go somewhere</button></a>
            </div>
          </div>
        @endforeach

        <div class="mt-3">
          {{ $products->withQueryString()->links() }}
      </div>
    </div>
@endsection