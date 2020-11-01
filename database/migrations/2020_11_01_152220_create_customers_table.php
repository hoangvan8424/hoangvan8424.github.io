<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('contract_code')->nullable();
            $table->integer('photographer_id');
            $table->integer('shopper_id');
            $table->integer('makeup_id');
            $table->integer('product_demo_id');
            $table->integer('product_print_id');
            $table->string('note')->nullable();
            $table->timestamp('photography_date')->nullable();
            $table->text('product_id')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
