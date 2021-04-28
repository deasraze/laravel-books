<?php

namespace App\Http\Resources\Books;

use App\Models\Author;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int $id
 * @property string $title
 * @property string $publishing
 * @property Carbon $publish_date
 * @property string $description
 * @property Author[] $authors
 *
 * @method authors()
 */
class BookListResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'publishing' => $this->publishing,
            'publish_date' => $this->publish_date,
            'description' => $this->description,
            'authors' => array_map(function (Author $author) {
                return [
                    'id' => $author->id,
                    'name' => $author->full_name,
                ];
            }, $this->authors()->getModels()),
        ];
    }
}
