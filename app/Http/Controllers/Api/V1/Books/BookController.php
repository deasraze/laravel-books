<?php

namespace App\Http\Controllers\Api\V1\Books;

use App\Http\Controllers\Controller;
use App\Http\Requests\Books\BookRequest;
use App\Models\Book;
use App\Transformers\Books\BookDetailTransformer;
use App\Transformers\Books\BookListTransformer;
use App\UseCases\Books\BookService;
use Illuminate\Http\Response;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class BookController extends Controller
{
    private BookService $service;

    public function __construct(BookService $service)
    {
        $this->service = $service;
    }

    public function list()
    {
        $paginator = Book::with('authors')->orderByDesc('id')->paginate(10);
        $books = $paginator->getCollection();

        return fractal($books, BookListTransformer::class)
            ->paginateWith(new IlluminatePaginatorAdapter($paginator))
            ->withResourceName('books')
            ->respond();
    }

    public function book(Book $book)
    {
        return fractal($book, BookDetailTransformer::class)
            ->withResourceName('books')
            ->respond();
    }

    public function update(BookRequest $request, Book $book)
    {
        $this->service->edit($request, $book->id);

        return fractal(Book::findOrFail($book->id), BookDetailTransformer::class)
            ->withResourceName('books')
            ->respond();
    }

    public function remove(Book $book)
    {
        $this->service->remove($book->id);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
