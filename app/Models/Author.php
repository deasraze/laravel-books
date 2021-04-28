<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $birth_year
 */
class Author extends Model
{
    use HasFactory;

    public function getFullName(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
