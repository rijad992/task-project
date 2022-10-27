<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getFields()
    {
        $modelNamespace = 'App\Models\\';
        $className = $modelNamespace . ucfirst($this::class::$entity);

        return $className::getFields();
    }

    public function getFilters()
    {
        $modelNamespace = 'App\Models\\';
        $className = $modelNamespace . ucfirst($this::class::$entity);

        return $className::getFilters();
    }
}
