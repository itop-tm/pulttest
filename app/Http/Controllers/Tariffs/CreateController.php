<?php

namespace App\Http\Controllers\Tariffs;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tariffs\CreateRequest as Request;
use App\Models\Tariff;

class CreateController extends Controller
{
    public function __invoke(Request $request)
    {
        $tariff = Tariff::create($request->validated());

        return response([
            'success' => true,
            'data'    => $tariff
        ]);
    }
}