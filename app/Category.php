<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    const PAGINATE_LIMIT = 5;
    protected $fillable = [
        'name',
        'description',
        'slug',
    ];

}