<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author_id','category_id', 'pages', 'image', 'description'];

    public function categories() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function authors() : BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}
