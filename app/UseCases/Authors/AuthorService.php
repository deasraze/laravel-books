<?php

namespace App\UseCases\Authors;

use App\Http\Requests\Authors\AuthorRequest;
use App\Models\Author;

class AuthorService
{
    public function create(AuthorRequest $request): Author
    {
        return Author::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'birth_year' => $request['birth_year'],
        ]);
    }

    public function edit(AuthorRequest $request, int $id): void
    {
        $author = $this->getAuthor($id);

        $author->update([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'birth_year' => $request['birth_year'],
        ]);
    }

    public function remove(int $id): void
    {
        $author = $this->getAuthor($id);

        $author->delete();
    }

    private function getAuthor(int $id): Author
    {
        return Author::findOrFail($id);
    }
}
