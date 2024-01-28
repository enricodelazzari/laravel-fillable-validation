<?php

namespace Maize\FillableValidation\Tests\Support\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
    ];
}
