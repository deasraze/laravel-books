<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $publishing
 * @property Carbon $publish_date
 * @property string $description
 */
class Book extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = ['publish_date' => 'date:d.m.Y'];

    public function authors()
    {
        $this->belongsToMany(Author::class);
    }

    public function getPublishDateAttribute($value): string
    {
        return (new Carbon($value))->format('d.m.Y');
    }
}
