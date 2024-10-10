@extends('layout/index')

@section('head-title')
    Aggiungi un Autore
@endsection

@section('title')
    <h2 class="mt-5 mb-4">Aggiungi un Autore</h2>
@endsection

@section('main-content')
    <div class="col-md-5">
        <form action="{{route('author.store')}}" method="post">
            @csrf
            <div class="mb-3 form-floating">
                <input type="text" class="form-control" id="title" name="name" placeholder="Umberto Eco">
                <label for="title">Nome e Cognome</label>
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 form-floating birthday_width">
                <input type="date" class="form-control" id="title" name="birthday" placeholder="26.03.2006">
                <label for="title">Data di Nascita (opzionale)</label>
                @error('birthday')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="pt-4 border-top">
                <button type="submit" class="btn btn-primary me-3">Aggiungi l'Autore</button>
                <a href="{{route('author.list')}}"
                   class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Annulla</a>
            </div>
        </form>
    </div>
@endsection
