<?php

namespace App\Http\Controllers;

use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;


class PostController extends BaseController
{

    public function index(FilterRequest $request)
    {
//        $posts = Post::paginate(3);
        $categories = Category::all();
//        $posts = Post::with('category')->get();
        $data = $request->validated();
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate(3);

        return view('pages.index', [
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }

    public function create()
    {
//        $this->authorize('create', Post::class);
        $posts = Post::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('pages.create', [
            'posts' => $posts,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    public function store(StoreRequest $request)
    {
//        $this->authorize('create', Post::class);
        $data = $request->validated();

        $this->service->store($data);

//        return new PostResource($post);
        return redirect()->route('posts.index');

    }

    public function show(Post $post)
    {
        return view('pages.show', [
            'post' => $post
        ]);
    }

    public function edit(Post $post)
    {
//        $this->authorize('update', $post);
        $categories = Category::all();
        $tags = Tag::all();

        return view('pages.edit', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    public function update(UpdateRequest $request, Post $post)
    {
//        $this->authorize('update', $post);
        $data = $request->validated();

        $this->service->update($post, $data);

        return redirect()->route('posts.show', $post->id);
//        return redirect()->route('post.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }

}




//!!!!!!!!!!!!!!!!возможные варианты!!!!!!!!!!!!!!!!!!!!!!
//public function index() {
//    $posts = Post::where('is_published', 1)->get();
//    foreach ($posts as $post) {
//        dump($post->title);
//    }
//    dd('end');
//}

//public function index() {
//    $post = Post::where('is_published', 1)->first();
//    dump($post->title);
//}

//public function index() {
//
//    $posts = Post::where('likes', '<=', 54000)->get();
//    dd($posts) ;
//}

//public function create() {
//   Post::create([
//       'title' => 'updated',
//      'content' => 'updated',
//        и.т.д.
//   ]);
//}

//public function update() {
//    $post = Post::find(2);
//    $post->update([
//      'title' => 'updated',
//      'content' => 'updated',
//        и.т.д.
//    ]);
//    dd('updated');
//}

//удалить
//public function delete(){
//    $post = Post::find(2);
//    $post->delete();
//    dd('deleted');
//}

//восстановить
//public function delete(){
//    $post = Post::withoutTrashed()->find(2);
//    $post->restore();
//    dd('restore');
//}

//public function first_or_create()
//{
//
//    $post = Post::firstOrCreate(
//        [
//            'title' => 'Новости технологи'  // критерий поиска
//        ],
//        [
//            'content' => 'Содержание новости666',  // данные для создания
//            'image' => 'image.jpeg',
//            'likes' => rand(1, 100),
//            'is_published' => true,
//        ]
//    );
//    dump($post->content);
//    dd('finished');
//}

