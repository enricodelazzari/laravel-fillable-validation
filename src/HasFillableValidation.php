<?php

namespace Maize\FillableValidation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

trait HasFillableValidation
{
    protected static function bootHasFillableValidation(): void
    {
        static::saving(fn (Model $model) => $model->validate());
    }

    /**
     * @return array<string>
     */
    public function getFillable(): array
    {
        return array_is_list($this->fillable)
            ? $this->fillable
            : array_keys($this->fillable);
    }

    /**
     * @throws ValidationException
     */
    public function validate(
        ?array $data = null,
        array $rules = [],
        array $messages = [],
        array $attributes = [],
    ): self {
        $data ??= $this->getAttributes();

        if (! array_is_list($this->fillable)) {
            $rules = array_merge($this->fillable, $rules);
            Validator::make($data, $rules, $messages, $attributes)->validate();
        }

        return $this->fill($data);
    }
}
