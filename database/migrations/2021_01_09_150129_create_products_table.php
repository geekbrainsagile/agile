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
            $table->string('code', 50)->unique()->comment('Код товара');
            $table->string('article', 50)->nullable()->default('')->comment('Артикул');
            $table->string('description', 1024)->nullable()->default('')->comment('Наименование');
            $table->string('brand', 1024)->nullable()->default('')->comment('Бренд');
            $table->string('country', 100)->nullable()->default('')->comment('Страна производства');
            $table->float('price', 10,  2)->default(0)->comment('Цена');
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
        Schema::dropIfExists('products');
    }
}
