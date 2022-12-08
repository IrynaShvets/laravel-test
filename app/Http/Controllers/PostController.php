<?php

namespace App\Http\Controllers;

use App\Http\Filters\PostFilter;
use App\Http\Requests\FilterRequest;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    public function submit(PostRequest $req)
    {
        $post = new Post();
        $post->name = $req->input('name');
        $post->post = $req->input('post');

        $post->save();
       return new PostResource($post);
       // return redirect()->route('home')->with('success', 'The post has been added.');
    }

    public function allData(FilterRequest $request)
    {
        //$this->authorize('view', auth()->user()); ban on entering the site
        $data = $request->validated();

        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? 10;

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate($perPage, ['*'], 'page', $page);

        return PostResource::collection($posts);
       // return view('posts', compact('posts'));
    }

    public function showOnePost($id)
    {
        $post = new Post();
        return view('one-post', ['data' => $post->find($id)]);
    }

    public function updatePost($id)
    {
        $post = new Post;
        return view('update-post', ['data' => $post->find($id)]);
    }

    public function updatePostSubmit($id, PostRequest $req)
    {
        $post = Post::find($id);
        $post->name = $req->input('name');
        $post->post = $req->input('post');

        $post->save();

        return redirect()->route('post-data-one', $id)->with('success', 'The post has been updated.');
    }

    public function deletePost($id)
    {
        Post::find($id)->delete();
        return redirect()->route('post-data')->with('success', 'The post has been deleted.');
    }
}
