<?php

namespace App\Http\Controllers\Authors;

use App\Http\Controllers\Controller;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::withCount('books')->orderByDesc('books_count')->paginate(10);

        return view('authors.index', compact('authors'));
    }

    public function show(Author $author)
    {
        $books = $author->books()->orderByDesc('publish_date')->get();

        return view('authors.show', compact('author', 'books'));
    }
}
