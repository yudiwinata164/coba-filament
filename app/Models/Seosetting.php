<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seosetting extends Model
{
        protected $fillable = [
        'title',
        'keyword',
        'description',
        'og_image',
    ];
}
