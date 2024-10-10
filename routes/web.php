<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [BookController::class, 'index'])->name('book.list');
Route::get('/book/{book}', [BookController::class, 'show'])->name('book.show');
Route::get('/addBook', [BookController::class, 'create'])->name('book.create');
Route::post('/storeBook', [BookController::class, 'store'])->name('book.store');
Route::get('/editBook/{book}', [BookController::class, 'edit'])->name('book.edit');
Route::post('/updateBook/{book}', [BookController::class, 'update'])->name('book.update');
Route::delete('/delete/{book}', [BookController::class, 'destroy'])->name('book.delete');

Route::get('/author', [AuthorController::class, 'index'])->name('author.list');
Route::get('/addAuthor', [AuthorController::class, 'create'])->name('author.create');
Route::post('/storeAuthor', [AuthorController::class, 'store'])->name('author.store');
Route::get('/editAuthor/{author}', [AuthorController::class, 'edit'])->name('author.edit');
Route::post('/updateAuthor/{author}', [AuthorController::class, 'update'])->name('author.update');
Route::delete('/deleteAuthor/{author}', [AuthorController::class, 'destroy'])->name('author.delete');


Route::get('/category', [CategoryController::class, 'index'])->name('category.list');
Route::get('/addCategory', [CategoryController::class, 'create'])->name('category.create');
Route::post('/storeCategory', [CategoryController::class, 'store'])->name('category.store');
Route::get('/editCategory/{category}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/updateCategory/{category}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/deleteCategory/{category}', [CategoryController::class, 'destroy'])->name('category.delete');


