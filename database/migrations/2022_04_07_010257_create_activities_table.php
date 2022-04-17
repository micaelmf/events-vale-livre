<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('description')->nullable();
            $table->string('level')->nullable();
            $table->time('duration');
            $table->dateTime('date');
            $table->longText('observations')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();

            $table->foreignId('speaker_id')->constrained();
            $table->foreignId('space_id')->constrained();
            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
