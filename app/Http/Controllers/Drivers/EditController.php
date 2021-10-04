<?php

namespace App\Http\Controllers\Drivers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Drivers\EditRequest as Request;
use App\Models\Driver;

class EditController extends Controller
{
    public function __invoke(Request $request)
    {
        $driver = Driver::whereId($request->id)->firstOrFail();

        $driver->update($request->validated());

        return response([
            'success' => true,
            'data'    => $driver
        ]);
    }
}