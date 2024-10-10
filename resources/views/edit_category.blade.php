@extends('layout/index')

@section('head-title')
    Modifica una Categoria
@endsection

@section('title')
    <h2 class="mt-5 mb-4">Modifica una Categoria</h2>
@endsection

@section('main-content')
    <div class="col-md-5">
        <form action="{{route('category.update', $category)}}" method="post">
            @csrf
            <div class="mb-3 form-floating">
                <input type="text" class="form-control" id="title" name="name" placeholder="Romanzo, Saggio,..." value="{{$category->name}}">
                <label for="title">Nome della Categoria</label>
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="pt-4 border-top">
                <button type="submit" class="btn btn-primary me-3">Salva le modifiche</button>
                <a href="{{route('category.list')}}" class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Annulla</a>
            </div>
        </form>
    </div>
@endsection
