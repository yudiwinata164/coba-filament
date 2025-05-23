<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title',
        'url',
        'status',
        'content',
        'featured_image',
        'keyword',
        'description',
    ];
}
