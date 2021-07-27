@extends('layouts.app')

@section('content') 

    <div class="d-flex justify-content-between">
        <h1>Elenco Post</h1> 
        <form>
            <a class="btn btn-primary" href="{{ route("admin.posts.create") }}">Crea un Post</a>
        </form>
    </div>

    @if (session('deleted'))
        <div class="alert alert-success">
            {{ session('deleted') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titolo</th>
                <th>Slug</th>
                <th>Categoria</th>
                <th colspan="3">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $item)
                < <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->slug }}</td>
                    <td>
                        @if ($item->category)
                            {{ $item->category->name }}
                        @endif
                    </td>
                    <td>
                        <a href="{{ route("admin.posts.show", $item->id) }}" class="btn btn-success">SHOW</a>
                    </td>
                    <td>
                        <a href="{{ route("admin.posts.edit", $item->id) }}" class="btn btn-primary">EDIT</a>
                    </td>
                    <td>
                        <form 
                            action="{{ route('admin.posts.destroy', $item->id) }}" 
                            method="POST"
                            onsubmit = "return confirm('Confermi di voler eliminare definitivamente {{ $item->title }} ?')">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="DELETE">
                        </form>
                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table>
    
    {{ $posts->links() }}
    
    
@endsection