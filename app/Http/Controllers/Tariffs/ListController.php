<?php

namespace App\Http\Controllers\Tariffs;

use App\Http\Controllers\Controller;
use App\Models\Tariff;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function __invoke(Request $request)
    {
        $tariff = Tariff::paginate(10);
        
        return response([
            'success' => true,
            'data'    => $tariff
        ]);
    }
}