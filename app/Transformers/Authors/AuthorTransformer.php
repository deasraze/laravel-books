<?php

namespace App\Transformers\Authors;

use App\Models\Author;
use League\Fractal\TransformerAbstract;

class AuthorTransformer extends TransformerAbstract
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
            'name' => $author->full_name,
        ];
    }
}
