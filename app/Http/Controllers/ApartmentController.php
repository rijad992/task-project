<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use App\Models\Apartment;
use App\Utils\Entities;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    protected static $entity = 'apartment';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //@TODO: Validate request body
        $filters = json_decode($request->getContent(), true);

        return Apartment::search($filters);
    }
}
