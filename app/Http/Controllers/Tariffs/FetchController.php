<?php

namespace App\Http\Controllers\Tariffs;

use App\Http\Controllers\Controller;
use App\Models\Tariff;
use Illuminate\Http\Request;

class FetchController extends Controller
{
    public function __invoke(Request $request)
    {
        $tariff = Tariff::whereId($request->id)->firstOrFail();

        return response([
            'success' => true,
            'data'    => $tariff
        ]);
    }
}