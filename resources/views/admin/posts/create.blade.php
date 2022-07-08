@extends('layouts.dashboard')

@section('content')
    <div class="container">

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

        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="title" class="form-label"><h4>Titolo Post</h4></label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label"><h4>Categoria:</h4></label>
                <select type="text" class="form-control" id="category_id" name="category_id">
                    <option value="">Nessuna</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">

                <h4>Tags:</h4>

                @foreach ($tags as $tag)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" id="tag{{ $tag->id }}" name="tags[]">
                        <label class="form-check-label" for="tag{{ $tag->id }}">
                        {{ $tag->name }}
                        </label>
                    </div>
                @endforeach
                
            </div>

            <div class="mb-3">
                <label for="content" class="form-label"><h4>Contenuto post:</h4></label>
                <textarea type="text" class="form-control" id="content" name="content" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
