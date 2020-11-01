<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPrintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_prints', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('employee_id');
            $table->timestamp('date_send_selected_code')->nullable();
            $table->timestamp('review_date_1')->nullable();
            $table->timestamp('review_date_2')->nullable();
            $table->timestamp('review_date_3')->nullable();
            $table->timestamp('closing_date')->nullable();
            $table->timestamp('delivery_date_in_branch')->nullable();
            $table->timestamp('customer_receive_date')->nullable();
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
        Schema::dropIfExists('product_prints');
    }
}
