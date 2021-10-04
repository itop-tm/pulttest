<?php

namespace App\Http\Controllers\Drivers;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function __invoke(Request $request)
    {
        $drivers = Driver::paginate(10);
        
        return response([
            'success' => true,
            'data'    => $drivers
        ]);
    }
}