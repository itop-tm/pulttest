<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    protected $casts = [
        'original_coordinates' => 'json',
        'destination_coordinates' => 'json',
    ];

    // $table->string("original_address");
    // $table->string("destination_address");

    // $table->json("original_coordinates");
    // $table->json("destination_coordinates");

    // $table->integer('minimal_cost')->nullable();
    // $table->integer('counted_cost_km');
    // $table->integer('counted_cost_minutes');
    // $table->integer('total_cost');

    // $table->string('status');
}
