<?php

namespace App\Http\Controllers\Admin\Authors;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authors\AuthorRequest;
use App\Models\Author;
use App\UseCases\Authors\AuthorService;

class AuthorController extends Controller
{
    private AuthorService $service;

    public function __construct(AuthorService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $authors = Author::withCount('books')->orderByDesc('id')->paginate(10);

        return view('admin.authors.index', compact('authors'));
    }

    public function create()
    {
        return view('admin.authors.create');
    }

    public function store(AuthorRequest $request)
    {
        $author = $this->service->create($request);

        return redirect()->route('authors.show', $author);
    }

    public function edit(Author $author)
    {
        return view('admin.authors.edit', compact('author'));
    }

    public function update(AuthorRequest $request, Author $author)
    {
        $this->service->edit($request, $author->id);

        return redirect()->route('authors.show', $author);
    }

    public function destroy(Author $author)
    {
        $this->service->remove($author->id);

        return redirect()->route('admin.authors.index');
    }
}
