<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pro_name');
            $table->string('pro_slug');
            $table->tinyInteger('hot')->default(0);
            $table->bigInteger('pro_category_id')->unsigned()->default(0);
            $table->bigInteger('brand_id')->unsigned()->default(0);
            $table->integer('pro_price')->default(0);
            $table->tinyInteger('pro_sale')->default(0);
            $table->integer('pro_active')->default(1);
            $table->integer('pro_view')->default(0);
            $table->longText('pro_description')->nullable();
            $table->longText('pro_content')->nullable();
            $table->string('pro_avatar')->nullable();
            $table->string('pro_img_1')->nullable();
            $table->string('pro_img_2')->nullable();
            $table->string('pro_img_3')->nullable();
            $table->string('pro_img_4')->nullable();
            $table->integer('pro_auth_id')->default(0)->index();
            $table->timestamps();
            $table->foreign('pro_category_id')->references('id')->on('categories');
            $table->foreign('brand_id')
                ->references('id')
                ->on('brands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_pro_category_id_foreign');
            $table->dropColumn('pro_category_id');
            $table->dropForeign('products_brand_id_foreign');
            $table->dropColumn('brand_id');
        });
        Schema::dropIfExists('products');
    }
}
