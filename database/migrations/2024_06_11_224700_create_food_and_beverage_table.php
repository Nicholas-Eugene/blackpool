<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foodandbeverage', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 8, 2);
            $table->text('description');
            $table->integer('stock');
            $table->string('mainpic');
            $table->string('pic2')->nullable();
            $table->string('pic3')->nullable();
            $table->string('pic4')->nullable();
            $table->string('type'); // Add the type column
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
        Schema::dropIfExists('foodandbeverage');
    }
};
