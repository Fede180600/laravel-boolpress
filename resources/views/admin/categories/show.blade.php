@extends('layouts.dashboard')

@section('content')
    <h2>{{ $category->name }}</h2>
    <ul class="list-group">
        @forelse ($category->posts as $post)
        <li class="list-group-item"><a href="{{ route('admin.posts.show', ['post' => $post->id]) }}">{{ $post->title }}</a></li>
        @empty
            <h5>Nessun Post</h5>
        @endforelse
    </ul>
@endsection