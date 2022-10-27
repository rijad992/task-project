<?php

namespace App\Models;

use App\Filters\ApartmentSearchFilters;
use App\Utils\FieldTypes;
use App\Utils\FilterOperators;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'bedrooms', 'bathrooms', 'storeys', 'garages'];

    public static function getFields()
    {
        return ['name' => ['label' => 'Name', 'type' => FieldTypes::TEXT],  'price' => ['label' => 'Price', 'type' => FieldTypes::NUMBER], 'bedrooms' => ['label' => 'Bedrooms', 'type' => FieldTypes::NUMBER], 'bathrooms' => ['label' => 'Bathrooms', 'type' => FieldTypes::NUMBER], 'storeys' => ['label' => 'Storeys', 'type' => FieldTypes::NUMBER], 'garages' => ['label' => 'Garages', 'type' => FieldTypes::NUMBER]];
    }

    public static function getFilters()
    {
        $filters = new ApartmentSearchFilters();
        return $filters->getFilters();
    }

    public static function search($filters)
    {
        if (!$filters) {
            return self::all();
        }
        $queryBuilder = self::query();

        foreach ($filters as $filter) {
            $value = $filter['value'];
            if ($filter['operator'] === FilterOperators::BETWEEN) {
                sort($value);
                $queryBuilder->whereBetween($filter['field'], $value);
                continue;
            }

            if ($filter['operator'] === FilterOperators::LIKE) {
                $value = "%{$filter['value']}%";
            }

            $queryBuilder->Where($filter['field'], FilterOperators::FILTER_OPERATORS_MAP[$filter['operator']], $value);
        }
        return $queryBuilder->get();
    }
}
