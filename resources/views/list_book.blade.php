@extends('layout/index')

@section('head-title')
    I miei Libri
@endsection

@section('title')
    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="{{route('book.list')}}" class="btn btn-secondary active">Libri</a>
        <a href="{{route('author.list')}}" class="btn btn-secondary">Autori</a>
        <a href="{{route('category.list')}}" class="btn btn-secondary">Categorie</a>
    </div>
    <a href="{{route('book.create')}}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Aggiungi un
        Libro</a>
    <h2 class="mt-5 mb-4">I miei Libri</h2>
@endsection

@section('main-content')
    <section class="row">
        <div class="col-md-12">
            <div class="list-book">
                @forelse($books as $book)
                    @include('partial.book_block')
                @empty
                    <article class="row border-bottom border-dark-subtle py-3">
                        <div class="col-12">
                            Non sono presenti Libri.
                        </div>
                    </article>
                @endforelse
            </div>
        </div>
    </section>
@endsection
