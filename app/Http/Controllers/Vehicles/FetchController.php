<?php

namespace App\Http\Controllers\Vehicles;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class FetchController extends Controller
{
    public function __invoke(Request $request)
    {
        $vehicle = Vehicle::whereId($request->id)->firstOrFail();

        return response([
            'success' => true,
            'data'    => $vehicle
        ]);
    }
}