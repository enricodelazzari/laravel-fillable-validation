<?php

namespace Maize\FillableValidation\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Maize\FillableValidation\FillableValidation
 */
class FillableValidation extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Maize\FillableValidation\FillableValidation::class;
    }
}
