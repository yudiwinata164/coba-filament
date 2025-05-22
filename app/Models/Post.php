<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'url',
        'category_id',
        'status',
        'content',
        'featured_image',
        'keyword',
    ];

    public function category()
    {
        return $this->belongsTo(Postcategory::class, 'category_id');
    }
}
