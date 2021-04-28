<?php

namespace App\Http\Controllers\Admin\Books;

use App\Http\Controllers\Controller;
use App\Http\Requests\Books\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\UseCases\Books\BookService;

class BookController extends Controller
{
    private BookService $service;

    public function __construct(BookService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $books = Book::with('authors')->orderByDesc('id')->paginate(10);

        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::orderBy('last_name')->get();

        return view('admin.books.create', compact('authors'));
    }

    public function store(BookRequest $request)
    {
        $book = $this->service->create($request);

        return redirect()->route('books.show', $book);
    }

    public function edit(Book $book)
    {
        $authors = Author::orderBy('last_name')->get();
        $bookAuthors = $book->authors()->pluck('id')->toArray();

        return view('admin.books.edit', compact('book', 'authors', 'bookAuthors'));
    }

    public function update(BookRequest $request, Book $book)
    {
        $this->service->edit($request, $book->id);

        return redirect()->route('books.show', $book);
    }

    public function destroy(Book $book)
    {
        $this->service->remove($book->id);

        return redirect()->route('admin.books.index');
    }
}
