@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-5">
        <h1>Modifica il Post: {{ $post->title }}</h1>
        <form>
            <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary">Visualizza</a>
        </form>
    </div>

    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group mt-3">
            <label for="title"><strong>Titolo</strong></label>
            <input type="text" class="form-control" id="title" placeholder="Inserisci il titolo del Post" name="title" value="{{$post->title}}">
        </div>
        <div class="form-group mt-3">
            <label for="content"><strong>Contenuto</strong></label>
            <input type="text" class="form-control" id="content" placeholder="Inserisci il contenuto del Post" name="content" value="{{$post->content}}">
        </div>
        <div class="form-group">
            <label for="category_id">Categoria</label>
            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                <option value="">-- Seleziona una categoria --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ ($category->id == old('category_id', $post->category_id)) ? 'selected' : '' }}
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
                    @if ($errors->any())
                        <input class="form-check-input" name="tags[]" type="checkbox" id="tag-{{ $tag->id }}" value="{{ $tag->id }}"
                        {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}
                        >
                    @else
                        <input class="form-check-input" name="tags[]" type="checkbox" id="tag-{{ $tag->id }}" value="{{ $tag->id }}"
                        {{ $post->tags->contains($tag->id) ? 'checked' : '' }}
                        > 
                    @endif
                    
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
            <button type="submit" class="btn btn-primary mr-3" href="{{ route("admin.posts.index") }}"><strong>Salva</strong></button>
            <div>
                <a class="btn btn-secondary" href="{{ route("admin.posts.show", $post->id) }}">Annulla</a>
            </div>
        </div>
    </form>
@endsection    