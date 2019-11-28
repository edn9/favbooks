<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $fillable = [
        'category',
        'language',
        'title',
        'author',
        'pic',
        'year',
        'resume',
        'publisher',
        'pages',
        'rating'
    ];
}
