@extends('layouts.app')

@section('title-block')
    Products
@endsection

@section('content')
    <h1>Products</h1>

    <form action="{{ route('product-form') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" placeholder="Enter a title" id="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="text" name="image" placeholder="Enter a image" id="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" placeholder="Enter a price" id="price" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">description</label>
            <textarea name="description" id="description" placeholder="Enter a description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Send</button>
    </form>
@endsection