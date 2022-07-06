@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h2>Modifica Post</h2>
    {{-- BOX PER ERRORI NELLA VALIDAZIONE DEI CAMPI --}}
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
    {{-- /BOX PER ERRORI NELLA VALIDAZIONE DEI CAMPI --}}

      <form action="{{ route('admin.posts.update', ['post'=>$post->id]) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-3">
              <label for="title" class="form-label">Titolo Post</label>
              <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ? old('title') : $post->title }}">
          </div>

          <div class="mb-3">
              <label for="content" class="form-label">Contenuto Post</label>
              <textarea type="text" class="form-control" id="content" name="content" rows="10">{{ old('content') ? old('content') : $post->content }}</textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>
@endsection