<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('authors')->orderByDesc('id')->paginate(10);

        return view('books.index', compact('books'));
    }

    public function show(Book $book)
    {
        $authors = $book->authors()->orderBy('last_name')->get();

        return view('books.show', compact('book', 'authors'));
    }
}
