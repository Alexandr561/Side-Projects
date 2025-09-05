<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Services\Post\PostService;

class ApiPostController extends Controller
{
//    private PostService $postService;
//
//    public function __construct(PostService $postService)
//    {
//        $this->postService = $postService;
//    }

    public function index()
    {
        $posts = Post::all();
        return PostResource::collection($posts);
//           если добавить resolve уберется вывод data
//        return PostResource::collection($posts)->resolve();
    }

    public function show(Post $post)
    {

        return PostResource::make($post);
//           или (одно и тоже)
//        return new PostResource($post);

    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        // Извлекаем теги
        $tags = $data['tags'] ?? [];
        unset($data['tags']);

        // Создаем пост
        $post = Post::create($data);

        // Прикрепляем теги
        if (!empty($tags)) {
            $post->tags()->attach($tags);
        }

        // Загружаем отношения
        $post->load('tags', 'category');

        // Вернуть ресурс созданного поста
        return PostResource::make($post);
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();

        // Извлекаем теги
        $tags = $data['tags'] ?? [];
        unset($data['tags']);

        // Обновляем пост
        $post->update($data);

        // Синхронизируем теги (даже если массив пустой)
        $post->tags()->sync($tags);

        // Загружаем отношения
        $post->load('tags', 'category');

        return PostResource::make($post);
    }

    public function destroy(Post $post){
        $post->delete();
        return response()->json([
           'message' => 'good job'
        ]);
    }
}
