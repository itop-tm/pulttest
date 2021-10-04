<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest as Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = User::whereEmail($request->email)->firstOrFail();
        
        abort_if(!Hash::check($request->password, $user->password), 401, 'invalid credentials');

        $token = $user->createToken('PAT');

        return response([
            'success' => true,
            'data'    => [
                'access_token' => $token->accessToken->token
            ]
        ]);
    }
}