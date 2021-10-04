<?php

namespace Tests\Api\Vehicles;

use App\Models\User;
use Tests\Api\ApiTestCase as TestCase;

class OrdersTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::whereRole('USER')->first());
    }

    public function test_user_can_order_car_test()
    {
        // На входе получается следующие параметры: адрес откуда и куда,
        // координаты откуда и куда, ID тарифа.
        $order = [
            'tariff_id'               => 10,
            'original_address'        => 'Мытыщи',
            'destination_address'     => 'Медведкого',
            'original_coordinates'    => [
                'lat' => 56.013486182110796,
                'lng' => 37.68654488442285
            ],
            'destination_coordinates' => [
                'lat' => 55.894699506429255,
                'lng' => 37.66045235683056
            ]
        ];

        $response = $this->postJson('order',  $order);

        $response->dump();

        $response->assertStatus(200);
    }

    public function test_user_can_see_orders_list_test()
    {
        $response = $this->json('GET', 'order/list');

        $response->dump();

        $response->assertStatus(200);
    }
    
}
