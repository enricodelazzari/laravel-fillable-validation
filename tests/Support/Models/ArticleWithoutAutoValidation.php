<?php

namespace Maize\FillableValidation\Tests\Support\Models;

use Illuminate\Database\Eloquent\Model;
use Maize\FillableValidation\Contracts\WithoutAutoValidation;
use Maize\FillableValidation\HasFillableValidation;
use Maize\FillableValidation\Rules;

class ArticleString extends Model implements WithoutAutoValidation
{
    use HasFillableValidation;

    protected $table = 'articles';

    public function rules(): Rules
    {
        return Rules::make([
            'title' => 'required|string',
        ]);
    }
}
