<?php

namespace App\Http\Controllers\Drivers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Drivers\CreateRequest as Request;
use App\Models\Driver;

class CreateController extends Controller
{
    public function __invoke(Request $request)
    {
        $driver = Driver::create($request->validated());

        return response([
            'success' => true,
            'data'    => $driver
        ]);
    }
}