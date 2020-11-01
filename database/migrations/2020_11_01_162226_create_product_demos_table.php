<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDemosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_demos', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('employee_id');
            $table->timestamp('receive_demo_date')->nullable();
            $table->timestamp('expected_delivery_date_1')->nullable();
            $table->timestamp('expected_delivery_date_2')->nullable();
            $table->timestamp('expected_delivery_date_3')->nullable();
            $table->timestamp('delivery_date')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('product_demos');
    }
}
