<?php

namespace App\Http\Controllers;

use App\Http\Filters\ProductFilter;
use App\Http\Requests\FilterRequest;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function create(ProductRequest $req)
    {
        $product = new Product();
        $product->title = $req->input('title');
        $product->image = $req->input('image');
        $product->price = $req->input('price');
        $product->description = $req->input('description');

        $product->save();

        return redirect()->route('home')->with('success', 'The product has been added.');
    }

    public function index(FilterRequest $request)
    {
        $data = $request->validated();

        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? 10;

        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
        //$products = Product::paginate(10);
        $products = Product::filter($filter)->paginate($perPage, ['*'], 'page', $page);
        return view('products', compact('products'));
      
    }

    public function showOneProduct($id)
    {
        $product = new Product();
        return view('one-product', ['data' => $product->find($id)]);
    }
}
