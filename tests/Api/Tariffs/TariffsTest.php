<?php

namespace Tests\Api\Tariffs;

use App\Models\User;
use App\Models\Tariff;
use Tests\Api\ApiTestCase as TestCase;

class TariffsTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::whereRole('ADMIN')->first());
    }

    public function test_it_can_add_tariff_test()
    {
        $tariff = Tariff::factory(1);

        $response = $this->postJson('tariff',  $tariff->definition());

        $response->dump();

        $response->assertStatus(200);
    }

    public function test_it_can_edit_tariff_by_id_test()
    {
        $tariff = Tariff::factory(1);

        $response = $this->json('PUT', 'tariff/1', $tariff->definition());

        $response->dump();

        $response->assertStatus(200);
    }

    public function test_it_can_see_list_of_tariffs_test()
    {
        $response = $this->json('GET', 'tariff/list');

        $response->dump();

        $response->assertStatus(200);
    }

    public function test_it_can_fetch_tariff_by_id_test()
    {
        $response = $this->json('GET', 'tariff/1');

        $response->dump();

        $response->assertStatus(200);
    }

    public function test_it_can_delete_tariff_by_id_test()
    {
        $response = $this->json('DELETE', 'tariff/1');

        $response->dump();

        $response->assertStatus(200);
    }
}
