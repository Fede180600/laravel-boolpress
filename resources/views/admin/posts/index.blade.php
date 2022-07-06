@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h2>Lista dei tuoi posts:</h2>
        <div class="row row-cols-3">

            @foreach ($posts as $post)
            <div class="col">
                <div class="card mb-3">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <a href="{{ route('admin.posts.show', ['post'=>$post->id]) }}" class="btn btn-primary">Leggi post</a>
                    </div>
                </div>
            </div> 
            @endforeach

    
        </div>
    </div>
        
@endsection
