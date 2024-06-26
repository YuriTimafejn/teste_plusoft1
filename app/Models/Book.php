<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title','author','note', 'flag_id'];

    public function flag(): BelongsTo
    {
        return $this->belongsTo(FlagBook::class, 'flag_id', 'id');
    }
}
