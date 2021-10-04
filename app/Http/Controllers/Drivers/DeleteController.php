<?php

namespace App\Http\Controllers\Drivers;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Request $request)
    {
        $driver = Driver::whereId($request->id)->firstOrFail();

        $driver->delete();

        return response([
            'success' => true
        ]);
    }
}