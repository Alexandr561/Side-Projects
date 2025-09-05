@extends('layouts.main')
@section('title', 'INDEX')

@section('contentSection')

    @foreach($posts as $post)
        <a href="{{route('posts.show', $post->id)}}" class="text-decoration-none">
            <div class="p-3 mb-2 bg-body-tertiary rounded hover-bg-light">
                {{$post->id}}. {{$post->title}}
            </div>
        </a>
    @endforeach
{{--    @foreach($posts as $post)--}}
{{--        <div>--}}
{{--            <h3>{{ $post->title }}</h3>--}}
{{--            <p>Категория: {{ $post->category->name }}</p>--}}
{{--        </div>--}}
{{--    @endforeach--}}

@can('create', \App\Models\Post::class)
    <div class="mt-4">
        <a href="{{ route('posts.create') }}" class="btn btn-secondary">
            CREATE POST
        </a>
    </div>
@endcan

    <div class="mt-5">
        {{$posts->withQueryString()->links()}}
    </div>

@endsection
