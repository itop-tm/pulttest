<?php

namespace App\Http\Controllers\Vehicles;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function __invoke(Request $request)
    {
        $vehicle = Vehicle::paginate(10);
        
        return response([
            'success' => true,
            'data'    => $vehicle
        ]);
    }
}