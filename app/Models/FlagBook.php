<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class FlagBook extends Model
{
    use HasFactory;

    public function book(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
