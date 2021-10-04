<?php

namespace App\Http\Controllers\Drivers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Drivers\AssignVehicleRequest as Request;
use App\Models\Driver;
use App\Models\Vehicle;

class AssignVehicleController extends Controller
{
    public function __invoke(Request $request)
    {
        $driver = Driver::whereId($request->driver_id)->firstOrFail();
        $vehicle = Vehicle::whereId($request->vehicle_id)->firstOrFail();

        $driver->assign($vehicle);

        return response([
            'success' => true
        ]);
    }
}