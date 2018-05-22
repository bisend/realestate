<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->change();
            $table->integer('category_id')->nullable()->change();
            $table->integer('type_id')->nullable()->change();
            $table->integer('location_id')->nullable()->change();
            $table->text('location')->nullable()->change();
            $table->string('alias')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->integer('user_id')->index();
            $table->integer('category_id')->index();
            $table->integer('type_id')->nullable();
            $table->integer('location_id')->index();
            $table->text('location');
            $table->string('alias');
        });
    }
}
