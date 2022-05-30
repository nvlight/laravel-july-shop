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
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('price')->nullable()->default(0)->unsigned();
            $table->float('age_start')->nullable()->default(0); // 2.5 года - до
            $table->float('age_end')  ->nullable()->default(0); // 3.5 года - круто!
            $table->string('size')  ->nullable()->default(0);   // размер одежды - ага!
            $table->integer('category_id')->nullable()->unsigned();
            $table->integer('country_id')->nullable()->unsigned();
            $table->integer('brand_id')->nullable()->unsigned();
            $table->integer('gallery_id')->nullable()->unsigned();
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
