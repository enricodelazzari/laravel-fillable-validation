<?php

namespace Maize\FillableValidation;

use Illuminate\Support\Collection;
use InvalidArgumentException;

class Rules
{
    protected array $rules;

    public function __construct(
        Collection|array $rules
    ) {
        $this->rules = $this->validate($rules);
    }

    public static function make(array $rules): self
    {
        return new self($rules);
    }

    protected function validate(Collection|array $rules): array
    {
        if (! is_array($rules)) {
            $rules = $rules->toArray();
        }

        if (! is_array($rules)) {
            throw new InvalidArgumentException();
        }

        if (array_is_list($rules)) {
            throw new InvalidArgumentException();
        }

        return $rules;
    }

    public function toArray(): array
    {
        return $this->rules;
    }

    public function getKeys(): array
    {
        return array_keys(
            $this->rules
        );
    }
}
