<?php

namespace Tests\Api\Drivers;

use App\Models\Driver;
use App\Models\User;
use Tests\Api\ApiTestCase as TestCase;

class DriversTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::whereRole('ADMIN')->first());
    }

    public function test_it_can_add_driver_test()
    {
        $driver = Driver::factory(1);

        $response = $this->postJson('driver',  $driver->definition());

        $response->dump();

        $response->assertStatus(200);
    }

    public function test_it_can_edit_driver_by_id_test()
    {
        $driver = Driver::factory(1);

        $response = $this->json('PUT', 'driver/10', $driver->definition());

        $response->dump();

        $response->assertStatus(200);
    }

    public function test_it_can_see_list_of_drivers_test()
    {
        $response = $this->json('GET', 'driver/list');

        $response->dump();

        $response->assertStatus(200);
    }

    public function test_it_can_fetch_driver_by_id_test()
    {
        $response = $this->json('GET', 'driver/10');

        $response->dump();

        $response->assertStatus(200);
    }

    public function test_it_can_delete_driver_by_id_test()
    {
        $response = $this->json('DELETE', 'driver/10');

        $response->dump();

        $response->assertStatus(200);
    }

    public function test_it_can_assign_driver_to_vehicle_test()
    {
        $response = $this->postJson('driver/assign', [
            'driver_id' => 1,
            'vehicle_id' => 1
        ]);

        $response->dump();

        $response->assertStatus(200);
    }
}
