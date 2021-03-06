@extends('layouts.app')

@section('content')

    @if (session('msg'))
    <div class="alert alert-success mb-4">
        {{ session('msg') }}
    </div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <div class="d-flex align-items-center">
            <h1 class="mr-2">{{ $post->title }}</h1>
            <h5>
                @if ($post->category)        
                    <a href="{{ route('admin.categories.show', $post->category->id) }}" class="badge badge-info">{{ $post->category->name }}</a>
                @else
                    <span class="badge badge-secondary">Nessuna categoria associata</span>     
                @endif
            </h5>
        </div>
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
        <h5>Tags</h5>
        @if (count($post->tags) > 0)
            <div class="mt-1 h6">
                @foreach ($post->tags as $tag)
                    <span class="badge badge-pill badge-dark">{{ $tag->name }}</span>    
                @endforeach
            </div>
        @else
            <h5 class="mt-1">Nessun tag collegato</h5>    
        @endif
    </div>

    <div class="mt-5">
        <h4>Contenuto</h4>
        <p>{{ $post->content }}</p>
    </div>

    <div class="mt-4">
        <a class="btn btn-primary" href="{{ route("admin.posts.index") }}">Torna all'elenco</a>
    </div>
@endsection