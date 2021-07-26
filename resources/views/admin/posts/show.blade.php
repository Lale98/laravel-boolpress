@extends('layouts.app')

@section('content')

    @if (session('msg'))
    <div class="alert alert-success mb-4">
        {{ session('msg') }}
    </div>
    @endif

    <div class="d-flex justify-content-between mb-5">
        <h1>{{ $post->title }}</h1>
        <div class="d-flex justify-content-between">
            <form class="me-1">
                <a class="btn btn-warning mr-2" href="{{ route("admin.posts.edit", $post->id) }}">Modifica</a>
            </form>
            <form 
                action="{{ route('admin.posts.destroy', $post->id) }}" 
                method="POST"
                onsubmit = "return confirm('Confermi di voler eliminare definitivamente {{ $post->title }} ?')">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger" value="Elimina">
            </form>
        </div>
    </div>

    <div>
        <h4>Contenuto</h4>
        <p>{{ $post->content }}</p>
    </div>

    <div class="mt-4">
        <a class="btn btn-primary" href="{{ route("admin.posts.index") }}">Torna all'elenco</a>
    </div>
@endsection