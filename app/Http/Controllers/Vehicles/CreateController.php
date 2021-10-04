<?php

namespace App\Http\Controllers\Vehicles;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vehicles\CreateRequest as Request;
use App\Models\Vehicle;

class CreateController extends Controller
{
    public function __invoke(Request $request)
    {
        $vehicle = Vehicle::create($request->validated());

        return response([
            'success' => true,
            'data'    => $vehicle
        ]);
    }
}