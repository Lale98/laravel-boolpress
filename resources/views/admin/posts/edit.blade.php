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
        <div class="d-inline-flex  mt-4">
            <button type="submit" class="btn btn-primary mr-3" href="{{ route("admin.posts.index") }}"><strong>Salva</strong></button>
            <div>
                <a class="btn btn-secondary" href="{{ route("admin.posts.show", $post->id) }}">Annulla</a>
            </div>
        </div>
    </form>
@endsection    