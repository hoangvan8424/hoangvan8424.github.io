<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('brand_name');
            $table->string('brand_slug');
            $table->integer('brand_status')->default(0);
            $table->bigInteger('c_id')->unsigned();
            $table->timestamps();
            $table->foreign('c_id')
                ->references('id')
                ->on('categories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('brands', function (Blueprint $table) {
           $table->dropForeign('brands_c_id_foreign');
           $table->dropColumn('c_id');
        });
        Schema::dropIfExists('brands');
    }
}
