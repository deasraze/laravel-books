<?php

namespace App\Transformers\Books;

use App\Models\Book;
use App\Transformers\Authors\AuthorDetailTransformer;
use League\Fractal\TransformerAbstract;

class BookDetailTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'authors',
    ];

    protected $availableIncludes = [
        //
    ];

    public function transform(Book $book): array
    {
        return [
            'id' => $book->id,
            'title' => $book->title,
            'publishing' => $book->publishing,
            'publish_date' => $book->publish_date,
            'description' => $book->description,
            'links' => [
                'self' => route('books.show', $book),
            ]
        ];
    }

    public function includeAuthors(Book $book)
    {
        return $this->collection($book->authors, new AuthorDetailTransformer(), 'author');
    }
}
