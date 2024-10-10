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
    <article class="detail-book row py-3 px-1 rounded-4">
        <div class="col-md-4">
            <figure>
                @if($book->image)
                    <img src="{{ asset('img/' . $book->image) }}" class="rounded" alt="{{ $book->title }}">
                @else
                    <img src="{{ asset('img/no-cover.webp') }}" class="rounded" alt="{{ $book->title }}">
                @endif
            </figure>
        </div>
        <div class="col-md-4">
            <h2 class="mb-3">{{ $book->title }}</h2>
            <div>
                <p>{{ $book->description }}</p>
            </div>
            <div class="border-top mt-2 pt-3">
                <span class="badge text-bg-secondary">{{ $author->name }}</span>
                <span class="badge text-bg-secondary">{{ $category->name }}</span>
                <span class="badge text-bg-secondary">{{ $book->pages }} pagine</span>
            </div>
        </div>
    </article>
@endsection

