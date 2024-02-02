<?php

namespace Maize\FillableValidation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;
use Maize\FillableValidation\Contracts\WithoutAutoValidation;

trait HasFillableValidation
{
    protected Rules $rules;

    protected function initializeHasFillableValidation(): void
    {
        $this->rules = $this->rules();

        $this->fillable(
            $this->rules->getKeys()
        );
    }

    protected static function bootHasFillableValidation(): void
    {
        static::saving(function (Model $model) {
            if ($model instanceof WithoutAutoValidation) {
                return;
            }
            $model->validate();
        });
    }

    protected function getRulesMessages(): array
    {
        return [];
    }

    protected function getRulesAttributes(): array
    {
        return [];
    }

    protected function prepareForValidation(): void
    {
        //
    }

    /**
     * @throws ValidationException
     */
    public function validate(): self
    {
        $this->prepareForValidation();

        validator(
            data: $this->getAttributes(),
            rules: $this->rules->toArray(),
            messages: $this->getRulesMessages(),
            attributes: $this->getRulesAttributes()
        )->validate();

        return $this;
    }
}
