<article class="card border-0">
    <div class="card-body">
        <h3 class="card-title">{{ $book->title }}</h3>
        @forelse($authors as $author)
            @if ($author->id == $book->author_id)
                <div>di {{ $author->name }}</div>
            @endif
        @empty
            <div>Artista sconosciuto</div>
        @endforelse
        @forelse($categories as $category)
            @if ($category->id == $book->category_id)
                <div class="mt-2"><span class="badge text-bg-secondary">{{ $category->name }}</span></div>
            @endif
        @empty
            <div>Categoria sconosciuta</div>
        @endforelse
        <div class="btn-group mt-3 d-flex justify-content-center" role="group" >
            <a href="{{route('book.show', $book)}}" class="btn btn-light"><i class="bi bi-eye"></i></a>
            <a href="{{route('book.edit', $book)}}" class="btn btn-light"><i class="bi bi-pencil"></i></a>
            <form action="{{route('book.delete', $book)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="confirm('Sei Sicuro? Stai eliminando un Libro')" class="btn btn-light"><i class="bi bi-trash3"></i></button>
            </form>
        </div>
    </div>
</article>
