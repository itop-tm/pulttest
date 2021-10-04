<?php

namespace App\Http\Controllers\Vehicles;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vehicles\AssignTariffRequest as Request;
use App\Models\Tariff;
use App\Models\Vehicle;

class AssignTariffController extends Controller
{
    public function __invoke(Request $request)
    {
        $vehicle = Vehicle::whereId($request->vehicle_id)->firstOrFail();
        $tariff = Tariff::whereId($request->tariff_id)->firstOrFail();

        $vehicle->assign($tariff);

        return response([
            'success' => true
        ]);
    }
}