<?php

namespace App\Filters\FilterFields;

use App\Utils\FieldTypes;
use App\Utils\FilterOperators;

class TextFilter extends Filter
{
    protected $type = FieldTypes::TEXT;
    protected $operator = FilterOperators::LIKE;
}
