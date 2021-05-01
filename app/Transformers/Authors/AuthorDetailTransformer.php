<?php

namespace App\Transformers\Authors;

use App\Models\Author;
use League\Fractal\TransformerAbstract;

class AuthorDetailTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        //
    ];

    protected $availableIncludes = [
        //
    ];

    public function transform(Author $author): array
    {
        return [
            'id' => $author->id,
            'first_name' => $author->first_name,
            'last_name' => $author->last_name,
            'birth_year' => $author->birth_year,
        ];
    }
}
