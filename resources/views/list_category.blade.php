@extends('layout/index')

@section('head-title')
    Le mie Categorie
@endsection

@section('title')
    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="{{route('book.list')}}" class="btn btn-secondary">Libri</a>
        <a href="{{route('author.list')}}" class="btn btn-secondary">Autori</a>
        <a href="{{route('category.list')}}" class="btn btn-secondary active">Categorie</a>
    </div>
    <a href="{{route('category.create')}}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Aggiungi una
        Categoria</a>
    <h2 class="mt-5 mb-4">Le mie Categorie</h2>
@endsection

@section('main-content')
    <div class="col-md-8">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col" class="w-auto">#</th>
                <th scope="col" class="w-50">Nome Categoria</th>
                <th scope="col" class="w-auto text-end">Azioni</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $num => $category)
                <tr>
                    <td class="align-middle">{{$num}}</td>
                    <td class="align-middle">{{$category->name}}</td>
                    <td class="text-end">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{route('category.edit', $category)}}" class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
                            <form action="{{route('category.delete', $category)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="confirm('Sei Sicuro? Stai eliminando una Categoria')" class="btn btn-secondary"><i class="bi bi-trash3"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <div>Non ci sono Categorie.</div>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
