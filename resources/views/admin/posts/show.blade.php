@extends('layouts.dashboard')

@section('content')
    <h1>{{ $post->title }}</h1>
    <small>SLUG: <strong>{{ $post->slug }}</strong></small>
    <p>{{ $post->content }}</p>
    <a class="btn btn-primary" href="{{ route('admin.posts.edit', ['post'=>$post->id]) }}">MODIFICA</a>
@endsection
