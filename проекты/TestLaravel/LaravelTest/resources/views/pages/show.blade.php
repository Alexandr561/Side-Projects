@extends('layouts.main')
@section('title', 'SHOW')

@section('contentSection')

    <div class="p-3 mb-2 bg-body-tertiary rounded hover-bg-light">
        {{$post->id}}. <strong>Title:</strong>
        <p>{{$post->title}}</p>
    </div>

    <div class="p-3 mb-2 bg-body-tertiary rounded hover-bg-light">
        <strong>Content:</strong>
        <p>{{$post->content}}</p>
    </div>

    <div class="p-3 mb-2 bg-body-tertiary rounded hover-bg-light text-decoration-none">
        <strong>Image:</strong>
        <p>{{$post->image}}</p>
    </div>

    <div class="p-3 mb-2 bg-body-tertiary rounded hover-bg-light text-decoration-none">
        <strong>category:</strong>
        <p>{{$post->category->name}}</p>
    </div>

    <div class="p-3 mb-2 bg-body-tertiary rounded hover-bg-light text-decoration-none">
        <strong>Tags:</strong>
        @foreach($post->tags as $tag)
            <span class="badge bg-secondary">{{ $tag->title }}</span>
        @endforeach
    </div>

    @can('create', \App\Models\Post::class)
    <div class="mt-4">
        <a href="{{route('posts.edit', $post->id)}} " class="btn btn-secondary">EDITE</a>
    </div>
    @endcan

    <div class="mt-4">
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">
            Back to All Posts
        </a>
    </div>

    <div class="mt-4">
        <!-- Кнопка-триггер модального окна -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                data-bs-target="#deleteModal-{{ $post->id }}">
            Delete
        </button>

        <!-- Модальное окно -->
        <div class="modal fade" id="deleteModal-{{ $post->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirm Deletion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this post?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Confirm Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
