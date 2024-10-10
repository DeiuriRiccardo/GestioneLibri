@extends('layout/index')

@section('head-title')
    Modifica un Libro
@endsection

@section('title')
    <h2 class="mt-5 mb-4">Modifica un Libro</h2>
@endsection

@section('main-content')
    <div class="col-md-5">
        <form action="{{route('book.update', $book)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 form-floating">
                <input type="text" class="form-control" id="title" placeholder="Il nome della Rosa" name="title" value="{{$book->title}}">
                <label for="title">Titolo</label>
                @error('title')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 form-floating">
                <textarea name="description" class="form-control textarea-height" placeholder="Inserisci la descrizione" id="description" >{{$book->description}}</textarea>
                <label for="description">Descrizione (opzionale)</label>
                @error('description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 form-floating nr_pages_width">
                <input type="number" class="form-control" id="pages" name="pages" placeholder="10" value="{{$book->pages}}">
                <label for="pages">N° Pagine (opzionale)</label>
                @error('pages')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 form-floating">
                <select class="form-select" aria-label="Default select example" id="author" name="author_id">
                    @forelse($authors as $author)
                        <option value="{{$author->id}}"
                        @if($author->id == $book->author_id)
                            selected
                        @endif
                        >{{$author->name}}</option>
                    @empty
                        <option>Non ci sono autori</option>
                    @endforelse
                </select>
                <label for="author">Autore</label>
                @error('author_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4 form-floating">
                <select class="form-select" aria-label="Default select example" id="category" name="category_id">
                    @forelse($categories as $category)
                        <option value="{{$category->id}}"
                        @if($category->id == $book->category_id)
                            selected
                        @endif
                        >{{$category->name}}</option>
                    @empty
                        <option>Non ci sono categorie</option>
                    @endforelse
                </select>
                <label for="category">Categoria</label>
                @error('category_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 form-floating">
                <input type="file" class="form-control" id="cover" name="cover" placeholder="Copertina Libro" value="{{$book->cover}}">
                <label for="cover">Copertina del Libro (opzionale)</label>
            </div>
            <div class="pt-4 border-top">
                <button type="submit" class="btn btn-primary me-3">Salva le modifiche</button>
                <a href="{{route('book.list')}}" class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Annulla</a>
            </div>
        </form>
    </div>
@endsection
