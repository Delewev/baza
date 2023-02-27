<?php

namespace App\Http\Controllers;


use App\Http\Filter\FilterInterface;
use App\Http\Filter\PostFilter;
use App\Http\Requests\FilterRequest;
use App\Http\Requests\PostStoreRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Request;

class PostController extends BaseController
{
    public function index(FilterRequest $request)
    {
        $data = $request->validated();
//        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
//        $posts = Post::filter($filter)->get();
//         dd($posts);
        $posts = Post::all();
        return view('Post.index', compact('posts'));
    }

    public function create(Request $request)
    {
        $categories = Category::all();
        return view('Post.create', compact('categories'));

    }

    public function store(PostStoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('post.index');
    }

    public function show(Post $post){
        return view('post.show', compact('post'));
    }

    public function edit(Post $post){
        $categories = Category::all();
        return view('Post.edit', compact('post', 'categories'));
    }

    public function update(PostStoreRequest $request, Post $post){
        $data = $request->validated();
        $post->update($data);
        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('post.index');
    }
}
