@extends('layouts.dashboard')

@section('content')
    <h1>{{ $post->title }}</h1>
    <small>SLUG: <strong>{{ $post->slug }}</strong></small>
    <p>{{ $post->content }}</p>
@endsection
