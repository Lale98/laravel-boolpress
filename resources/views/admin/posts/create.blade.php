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
        <div class="d-inline-flex  mt-4">
            <button type="submit" class="btn btn-primary mr-3"><strong>Salva</strong></button>
            <div>
                <a class="btn btn-secondary" href="{{ route("admin.posts.index") }}">Torna indietro</a>
            </div>
        </div>
      </form>
@endsection