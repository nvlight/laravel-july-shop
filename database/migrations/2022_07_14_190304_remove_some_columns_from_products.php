<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveSomeColumnsFromProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['age_start','age_end','size','country_id','brand_id','gallery_id']);
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
            $table->float('age_start')->nullable()->default(0); // 2.5 года - до
            $table->float('age_end')  ->nullable()->default(0); // 3.5 года - круто!
            $table->string('size')  ->nullable()->default(0);   // размер одежды - ага!
            $table->integer('country_id')->nullable()->unsigned();
            $table->integer('brand_id')->nullable()->unsigned();
            $table->integer('gallery_id')->nullable()->unsigned();
        });
    }
}
