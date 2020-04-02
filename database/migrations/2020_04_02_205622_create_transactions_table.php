<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('tr_user_id')->unsigned();
            $table->string('tr_user_name');
            $table->string('tr_user_email')->nullable();
            $table->string('tr_user_phone');
            $table->string('tr_address');
            $table->integer('tr_total')->default(0);
            $table->text('tr_note')->nullable();
            $table->tinyInteger('tr_status')->default(0)->index();
            $table->timestamps();
            $table->foreign('tr_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table){
           $table->dropForeign('transactions_tr_user_id_foreign');
        });
        Schema::dropIfExists('transactions');
    }
}
