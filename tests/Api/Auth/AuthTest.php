<?php

namespace Tests\Api\Auth;

use App\Models\User;
use Tests\Api\ApiTestCase as TestCase;

class AuthTest extends TestCase
{
    public function test_user_can_register_test()
    {
        $password = bcrypt('secret');
        
        $response = $this->postJson('auth/register',  [
            'name'     => 'May',
            'email'    => 'email@pulttaxi.ru',
            'password' => $password,
            'password_confirmation' => $password
        ]);

        $response->dump();

        $response->assertStatus(200);
    }

    public function test_user_can_login_test()
    {
        $response = $this->postJson('auth/login',  [
            'email'    => 'email@pulttaxi.ru',
            'password' => 'secret',
        ]);

        $response->dump();

        $response->assertStatus(200);
    }
}
