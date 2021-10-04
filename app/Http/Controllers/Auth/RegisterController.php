<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest as Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = new User($request->validated());

        $user->role = 'USER';

        $user->save();

        return response([
            'success' => true
        ]);
    }
}