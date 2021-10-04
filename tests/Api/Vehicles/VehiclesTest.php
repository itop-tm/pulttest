<?php

namespace Tests\Api\Vehicles;

use App\Models\User;
use App\Models\Vehicle;
use Tests\Api\ApiTestCase as TestCase;

class VehiclesTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::whereRole('ADMIN')->first());
    }

    public function test_it_can_add_vehicle_test()
    {
        $vehicle = Vehicle::factory(1);

        $response = $this->postJson('vehicle',  $vehicle->definition());

        $response->dump();

        $response->assertStatus(200);
    }

    public function test_it_can_edit_vehicle_by_id_test()
    {
        $vehicle = Vehicle::factory(1);

        $response = $this->json('PUT', 'vehicle/1', $vehicle->definition());

        $response->dump();

        $response->assertStatus(200);
    }

    public function test_it_can_see_list_of_vehicles_test()
    {
        $response = $this->json('GET', 'vehicle/list');

        $response->dump();

        $response->assertStatus(200);
    }

    public function test_it_can_fetch_vehicle_by_id_test()
    {
        $response = $this->json('GET', 'vehicle/1');

        $response->dump();

        $response->assertStatus(200);
    }

    public function test_it_can_delete_vehicle_by_id_test()
    {
        $response = $this->json('DELETE', 'vehicle/1');

        $response->dump();

        $response->assertStatus(200);
    }

    public function test_it_can_assign_tariff_to_vehicle_test()
    {
        $response = $this->postJson('vehicle/assign', [
            'tariff_id' => 1,
            'vehicle_id' => 1
        ]);

        $response->dump();

        $response->assertStatus(200);
    }
}
