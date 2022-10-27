<?php

namespace App\Filters\FilterFields;

use App\Utils\FieldTypes;
use App\Utils\FilterOperators;

class RangeFilter extends Filter
{
    protected $type = FieldTypes::RANGE;
    protected $operator = FilterOperators::BETWEEN;
}
