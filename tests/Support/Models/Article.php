<?php

namespace Maize\FillableValidation\Tests\Support\Models;

use Illuminate\Database\Eloquent\Model;
use Maize\FillableValidation\HasFillableValidation;

class Article extends Model
{
    use HasFillableValidation;

    protected array $rules = [
        'title' => 'required',
    ];
}
