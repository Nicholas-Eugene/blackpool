<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveBookingEndFromHistoryTable extends Migration
{
    public function up()
    {
        Schema::table('history', function (Blueprint $table) {
            $table->dropColumn('booking_end');
        });
    }

    public function down()
    {
        Schema::table('history', function (Blueprint $table) {
            $table->timestamp('booking_end')->nullable();
        });
    }
}

