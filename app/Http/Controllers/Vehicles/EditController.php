<?php

namespace App\Http\Controllers\Vehicles;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vehicles\EditRequest as Request;
use App\Models\Vehicle;

class EditController extends Controller
{
    public function __invoke(Request $request)
    {
        $driver = Vehicle::whereId($request->id)->firstOrFail();

        $driver->update($request->validated());

        return response([
            'success' => true,
            'data'    => $driver
        ]);
    }
}