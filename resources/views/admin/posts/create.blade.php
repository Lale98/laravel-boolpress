@extends('layouts.app')

@section('content')
    <h1>Crea un nuovo Post</h1>

    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group mt-3">
            <label for="title"><strong>Titolo</strong></label>
            <input type="text" class="form-control" id="title" placeholder="Inserisci il titolo del Post" name="title">
        </div>
        <div class="form-group mt-3">
            <label for="content"><strong>Contenuto</strong></label>
            <input type="text" class="form-control" id="content" placeholder="Inserisci il contenuto del Post" name="content">
        </div>
        <div class="form-group">
            <label for="category_id">Categoria</label>
            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                <option value="">-- Seleziona una categoria --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ ($category->id == old('category_id')) ? 'selected' : '' }}
                        >{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>  
        <div class="form-group mb-5">
            <h5>Tags</h5>
            @foreach ($tags as $tag)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name="tags[]" type="checkbox" id="tag-{{ $tag->id }}" value="{{ $tag->id }}"
                    {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}
                    >
                    <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                </div>     
            @endforeach 
            @error('tags')
                <div>
                    <small class="text-danger">{{ $message }}</small> 
                </div>
            @enderror   
        </div>    
        <div class="d-inline-flex  mt-4">
            <button type="submit" class="btn btn-primary mr-3"><strong>Salva</strong></button>
            <div>
                <a class="btn btn-secondary" href="{{ route("admin.posts.index") }}">Torna indietro</a>
            </div>
        </div>
      </form>
@endsection