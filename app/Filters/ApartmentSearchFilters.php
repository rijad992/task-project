<?php

namespace App\Filters;

use App\Filters\FilterFields\NumberFilter;
use App\Filters\FilterFields\RangeFilter;
use App\Filters\FilterFields\TextFilter;

class ApartmentSearchFilters implements SearchFilters {

    private function getNameFilter() {
        $filter = new TextFilter('Name');

        return $filter->getFilterMeta();
    }

    private function getBedroomsFilter() {
        $filter = new NumberFilter('Bedrooms');

        return $filter->getFilterMeta();
    }

    private function getBathroomsFilter() {
        $filter = new NumberFilter('Bathrooms');

        return $filter->getFilterMeta();
    }

    private function getStoreysFilter() {
        $filter = new NumberFilter('Storeys');

        return $filter->getFilterMeta();
    }

    private function getGaragesFilter() {
        $filter = new NumberFilter('Garages');

        return $filter->getFilterMeta();
    }

    private function getPriceFilter() {
        $filter = new RangeFilter('Price');

        return $filter->getFilterMeta();
    }

    public function getFilters()
    {
        return [
            'name' => $this->getNameFilter(),
            'bedrooms' => $this->getBedroomsFilter(),
            'bathrooms' => $this->getBathroomsFilter(),
            'stroeys' => $this->getStoreysFilter(),
            'garages'=> $this->getGaragesFilter(),
            'price'=> $this->getPriceFilter()
        ];
    }
    
}