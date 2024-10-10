@extends('layout/index')

@section('head-title')
    I miei Autori
@endsection

@section('title')
    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="{{route('book.list')}}" class="btn btn-secondary">Libri</a>
        <a href="{{route('author.list')}}" class="btn btn-secondary active">Autori</a>
        <a href="{{route('category.list')}}" class="btn btn-secondary">Categorie</a>
    </div>
    <a href="{{route('author.create')}}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Aggiungi un
        Autore</a>
    <h2 class="mt-5 mb-4">I miei Autori</h2>
@endsection

@section('main-content')
    <div class="col-md-8">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col" class="w-auto">#</th>
                    <th scope="col" class="w-50">Autore</th>
                    <th scope="col" class="w-25">Data di nascita</th>
                    <th scope="col" class="w-auto text-end">Azioni</th>
                </tr>
            </thead>
            <tbody>
            @forelse($authors as $num => $author)
                <tr>
                    <td class="align-middle">{{$num}}</td>
                    <td class="align-middle">{{$author->name}}</td>
                    <td class="align-middle">{{$author->birthday}}</td>
                    <td class="text-end">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{route('author.edit', $author)}}" class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
                            <form action="{{route('author.delete', $author)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="confirm('Sei Sicuro? Stai eliminando un Autore')" class="btn btn-secondary"><i class="bi bi-trash3"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <div>Non ci sono autori</div>
            @endforelse
@endsection
