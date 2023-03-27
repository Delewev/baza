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
    public function index()
    {
//        $this->authorize('view', auth()->user());
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    public function create(Request $request)
    {
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));

    }

    public function store(PostStoreRequest $request)
    {

        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('post.index');
    }

    public function show(Post $post){
        return view('admin.post.show', compact('post'));
    }

    public function edit(Post $post){
        $categories = Category::all();
        return view('admin.post.edit', compact('post', 'categories'));
    }

    public function update(PostStoreRequest $request, Post $post){
        $data = $request->validated();
        $post->update($data);
        return redirect()->route('admin.post.show', $post->id);
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('post.index');
    }
}
