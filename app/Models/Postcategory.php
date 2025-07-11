<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Postcategory extends Model
{
    protected $fillable = [
        'category',
        'url',
        'language',
        'status',
        'keyword',
        'description',
    ];
}
