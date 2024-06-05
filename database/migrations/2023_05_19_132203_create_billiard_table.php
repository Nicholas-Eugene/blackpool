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
        Schema::create('billiard', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30);
            $table->string('address', 400);
            $table->float('rating');
            $table->integer('totalrate');
            $table->integer('priceperhour');
            $table->string('description', 400);
            $table->string('openat', 100);
            $table->string('telephone', 20);
            $table->string('whatsapp', 20);
            $table->string('insta', 30);
            $table->string('mainpic');
            $table->string('pic2');
            $table->string('pic3');
            $table->string('pic4');
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
        Schema::dropIfExists('billiard');
    }
};
