<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedBigInteger("user_id")->index();
            $table->string("name");
            $table->string("status")->nullable();
            $table->unsignedBigInteger("start_price")->default(0);
            $table->unsignedBigInteger("adding_per_bid")->default(1000)->comment("On IDR");
            $table->text("descriptions")->nullable();
            $table->text("images")->default("[]")->comment("json format of product images url");
            $table->timestamp("end_bid")->nullable();
            $table->longText("comments")->default("[]")->comment("json type of cooments");
            $table->text("props")->nullable();
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
