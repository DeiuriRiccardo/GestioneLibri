<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;
use mysql_xdevapi\Exception;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::orderBy('name', 'asc')->get();
        $categories = Category::orderBy('name', 'asc')->get();
        $books = Book::orderBy('updated_at', 'desc')->get();

        return view('list_book', compact('books','authors', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::orderBy('name', 'asc')->get()->unique('name');
        $categories = Category::orderBy('name', 'asc')->get()->unique('name');
        return view('create_book', compact('authors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request) : RedirectResponse
    {
        if ($request->hasFile('image')) {
            try {
                $file= $request->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();

                $image = Image::make($file->getRealPath());
                $image->resize(400, 300, function ($constraint) {
                    $constraint->aspectRatio(); // Mantieni il rapporto di aspetto
                    $constraint->upsize();      // Evita di ingrandire l'immagine se è più piccola
                });

                $image->save(public_path('img') . '/' . $fileName);
                //$file->move(public_path('img'),$fileName);
                $imagePath = $fileName;
            }catch (Exception $ex){
                return "Error: " . $ex->getMessage();
            }
        }else{
            $imagePath= null;
        }
        $validatedData = $request->validated();
        $validatedData['image'] = $imagePath;

        Book::create($validatedData);
        return redirect()->route('book.list')->with('success', 'Libro aggiunto correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $author = Author::find($book->author_id);
        $category = Category::find($book->category_id);
        return view('detail_book', compact('book','author', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book) : View
    {
        $authors = Author::orderBy('name', 'asc')->get()->unique('name');
        $categories = Category::orderBy('name', 'asc')->get()->unique('name');
        return view('edit_book', compact('book','categories', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book) : RedirectResponse
    {
        $book->update($request->validated());
        return redirect()->route('book.list')->with('success', 'Libro modificato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.list')->with('success', 'Libro eliminato correttamente');
    }
}
