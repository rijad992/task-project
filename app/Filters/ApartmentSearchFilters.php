<?php

namespace App\Filters;

use App\Filters\FilterFields\NumberFilter;
use App\Filters\FilterFields\RangeFilter;
use App\Filters\FilterFields\TextFilter;

class ApartmentSearchFilters implements SearchFilters {

    private function getNameFilter() {
        $filter = new TextFilter('Name', 'name');

        return $filter->getFilterMeta();
    }

    private function getBedroomsFilter() {
        $filter = new NumberFilter('Bedrooms', 'bedrooms');

        return $filter->getFilterMeta();
    }

    private function getBathroomsFilter() {
        $filter = new NumberFilter('Bathrooms', 'bathrooms');

        return $filter->getFilterMeta();
    }

    private function getStoreysFilter() {
        $filter = new NumberFilter('Storeys', 'storeys');

        return $filter->getFilterMeta();
    }

    private function getGaragesFilter() {
        $filter = new NumberFilter('Garages', 'garages');

        return $filter->getFilterMeta();
    }

    private function getPriceFilter() {
        $filter = new RangeFilter('Price', 'price');

        return $filter->getFilterMeta();
    }

    public function getFilters()
    {
        return [
            $this->getNameFilter(),
            $this->getBedroomsFilter(),
            $this->getBathroomsFilter(),
            $this->getStoreysFilter(),
            $this->getGaragesFilter(),
            $this->getPriceFilter()
        ];
    }
    
}