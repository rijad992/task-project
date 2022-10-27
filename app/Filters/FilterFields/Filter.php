<?php

namespace App\Filters\FilterFields;

class Filter implements IFilter
{
    public function __construct(protected string $name, protected string $field, protected $options = [])
    {
    }

    public function getFilterMeta() {
        return [
            'name' => $this->name,
            'field' => $this->field,
            'type' => $this->type,
            'operator' => $this->operator,
            'options' => $this->options
        ];
    }
}
