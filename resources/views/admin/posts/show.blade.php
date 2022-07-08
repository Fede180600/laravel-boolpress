@extends('layouts.dashboard')

@section('content')
    <h1>{{ $post->title }}</h1>
    <small>SLUG: <strong>{{ $post->slug }}</strong></small>
    <p>Category: {{ $category ? $category->name : 'NESSUNA CATEGORIA' }}</p>
    <p>{{ $post->content }}</p>
    <div class="d-flex">
        <a class="btn btn-primary mr-2" href="{{ route('admin.posts.edit', ['post'=>$post->id]) }}">MODIFICA</a>
        <form action="{{ route('admin.posts.destroy', ['post'=>$post->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">ELIMINA</button>
        </form>
    </div>
@endsection
