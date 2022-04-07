<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_notices', function (Blueprint $table) {
            $table->id();
            $table->string('text');
            $table->dateTime('start_date');
            $table->dateTime('and_date');
            $table->timestamps();
            $table->softDeletes();

            $table->foreignId('user_id')->constrained();
            $table->foreignId('event_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_notices');
    }
}
