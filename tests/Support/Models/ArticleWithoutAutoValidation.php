<?php

namespace Maize\FillableValidation\Tests\Support\Models;

use Illuminate\Database\Eloquent\Model;
use Maize\FillableValidation\Contracts\WithoutAutoValidation;
use Maize\FillableValidation\HasFillableValidation;

class ArticleString extends Model implements WithoutAutoValidation
{
    use HasFillableValidation;

    protected $table = 'articles';

    protected array $rules = [
        'title' => 'required|string',
    ];
}
