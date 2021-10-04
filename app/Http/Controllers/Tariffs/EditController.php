<?php

namespace App\Http\Controllers\Tariffs;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tariffs\EditRequest as Request;
use App\Models\Tariff;

class EditController extends Controller
{
    public function __invoke(Request $request)
    {
        $tariff = Tariff::whereId($request->id)->firstOrFail();

        $tariff->update($request->validated());

        return response([
            'success' => true,
            'data'    => $tariff
        ]);
    }
}