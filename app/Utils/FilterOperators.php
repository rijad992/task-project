<?php

namespace App\Utils;

class FilterOperators {
    const EQ = 'eq';
    const BETWEEN = 'between';
    const LIKE = 'lk';

    const FILTER_OPERATORS_MAP = [
        self::EQ => '=',
        self::BETWEEN => 'between',
        self::LIKE => 'like'
    ];
}