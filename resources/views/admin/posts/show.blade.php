@extends('layouts.dashboard')

@section('content')
    <h1>{{ $post->title }}</h1>
    <small>SLUG: <strong>{{ $post->slug }}</strong></small>
    <p>{{ $post->content }}</p>
    <form action="{{ route('admin.posts.destroy', ['post'=>$post->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <a class="btn btn-primary" href="{{ route('admin.posts.edit', ['post'=>$post->id]) }}">MODIFICA</a>
        <button class="btn btn-danger">ELIMINA</button>
    </form>
@endsection
