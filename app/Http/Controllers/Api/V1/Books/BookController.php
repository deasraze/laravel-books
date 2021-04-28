<?php

namespace App\Http\Controllers\Api\V1\Books;

use App\Http\Controllers\Controller;
use App\Http\Requests\Books\BookRequest;
use App\Http\Resources\Books\BookDetailResource;
use App\Http\Resources\Books\BookListResource;
use App\Models\Book;
use App\UseCases\Books\BookService;
use Illuminate\Http\Response;

class BookController extends Controller
{
    private BookService $service;

    public function __construct(BookService $service)
    {
        $this->service = $service;
    }

    public function list()
    {
        $books = Book::with('authors')->orderByDesc('id')->paginate(10);

        return BookListResource::collection($books);
    }

    public function book(Book $book): BookDetailResource
    {
        return new BookDetailResource($book);
    }

    public function update(BookRequest $request, Book $book): BookDetailResource
    {
        $this->service->edit($request, $book->id);

        return new BookDetailResource(Book::findOrFail($book->id));
    }

    public function remove(Book $book)
    {
        $this->service->remove($book->id);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
