<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string("original_address");
            $table->string("destination_address");

            $table->json("original_coordinates");
            $table->json("destination_coordinates");

            $table->integer('minimal_cost')->nullable();
            $table->integer('counted_cost_km');
            $table->integer('counted_cost_minutes');
            $table->integer('total_cost');

            $table->string('status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
