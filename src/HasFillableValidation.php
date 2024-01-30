<?php

namespace Maize\FillableValidation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;
use InvalidArgumentException;
use Maize\FillableValidation\Contracts\WithoutAutoValidation;

trait HasFillableValidation
{
    protected function initializeHasFillableValidation(): void
    {
        $this->fillable(
            array_keys($this->rules)
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

    protected function getRules(): array
    {
        if (! property_exists($this, 'rules')) {
            return [];
        }

        if (! is_array($this->rules)) {
            throw new InvalidArgumentException();
        }

        if (array_is_list($this->rules)) {
            throw new InvalidArgumentException();
        }

        return $this->rules;
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
            rules: $this->getRules(),
            messages: $this->getRulesMessages(),
            attributes: $this->getRulesAttributes()
        )->validate();

        return $this;
    }
}
