<?php

namespace App\Models;

use App\Utils\FieldTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'bedrooms', 'bathrooms', 'storeys', 'garages'];

    public static function getFieldsTypeMap()
    {
        return ['name' => FieldTypes::TEXT,  'price' => FieldTypes::NUMBER, 'bedrooms' => FieldTypes::NUMBER, 'bathrooms' => FieldTypes::NUMBER, 'storeys' => FieldTypes::NUMBER, 'garages' => FieldTypes::NUMBER];
    }
}
