<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\Post\PostResource;
class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return inertia('Post/Index', [
            'posts' => PostResource::collection($posts)->resolve(),
        ]);
//        return inertia('Post/Index', compact('posts'));
    }

    public function create()
    {
        return inertia('Post/Create');
    }

    public function store(StoreRequest $request) {
        Post::create($request->validated());
        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return inertia('Post/Show', [
            'post' => $post
        ]);
    }

    public function edit(Post $post)
    {

        return inertia('Post/Edit', [
            'post' => $post
        ]);
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $post->update($request->validated());
        return redirect()->route('post.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }
}
