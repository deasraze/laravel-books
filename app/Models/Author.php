<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property Carbon $birth_year
 */
class Author extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = ['birth_year' => 'date:d.m.Y'];

    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getBirthYearAttribute($value): string
    {
        return (new Carbon($value))->format('d.m.Y');
    }

    public function getBirthYearFormAttribute(): string
    {
        return (new Carbon($this->birth_year))->format('Y-m-d');
    }

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
