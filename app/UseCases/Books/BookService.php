<?php

namespace App\UseCases\Books;

use App\Http\Requests\Books\BookRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class BookService
{
    public function create(BookRequest $request): Book
    {
        return DB::transaction(function () use ($request) {
            $book = Book::create([
                'title' => $request['title'],
                'publishing' => $request['publishing'],
                'publish_date' => $request['publish_date'],
                'description' => $request['description'],
            ]);

            foreach ($request['authors'] as $author) {
                $this->getAuthor($author)->addBook($book->id);
            }

            return $book;
        });
    }

    public function edit(BookRequest $request, int $id): void
    {
        $book = $this->getBook($id);

        DB::transaction(function () use ($request, $book) {
            $book->update([
                'title' => $request['title'],
                'publishing' => $request['publishing'],
                'publish_date' => $request['publish_date'],
                'description' => $request['description'],
            ]);

            $book->authors()->detach();

            foreach ($request['authors'] as $author) {
                $this->getAuthor($author)->addBook($book->id);
            }
        });
    }

    public function remove(int $id): void
    {
        $book = $this->getBook($id);

        $book->delete();
    }

    private function getBook(int $id): Book
    {
        return Book::findOrFail($id);
    }

    private function getAuthor(int $id): Author
    {
        return Author::findOrFail($id);
    }
}
