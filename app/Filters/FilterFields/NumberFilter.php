<?php

namespace App\Filters\FilterFields;

use \App\Utils\FieldTypes;
use App\Utils\FilterOperators;

class NumberFilter extends Filter
{

    protected $type = FieldTypes::NUMBER;
    protected $operator = FilterOperators::EQ;
}
