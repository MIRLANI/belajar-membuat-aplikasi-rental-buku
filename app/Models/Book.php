<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use Sluggable, SoftDeletes;
    protected $table = 'books';
    protected $fillable = [
        "book_code", 'title', "cover", "slug" 
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function catagories(): BelongsToMany
    {
        return $this->belongsToMany(Catagori::class, "books_catagories", "book_id", "catagori_id");
    }
}
