<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_details', function (Blueprint $table) {
            $table->id();
            $table->dateTime('job_call_start_date')->nullable();
            $table->dateTime('job_call_and_date')->nullable();
            $table->dateTime('announce_schedule_start_date')->nullable();
            $table->dateTime('announce_schedule_and_date')->nullable();
            $table->dateTime('certificates_issuance_start_date')->nullable();
            $table->dateTime('certificates_issuance_end_date')->nullable();
            $table->dateTime('subscription_issuance_start_date')->nullable();
            $table->dateTime('subscription_issuance_end_date')->nullable();
            $table->longText('link_schedule')->nullable()->nullable();
            $table->longText('link_certificates')->nullable()->nullable();
            $table->longText('link_photos')->nullable()->nullable();
            $table->longText('link_registrations')->nullable()->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreignId('event_id')->constrained();
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
        Schema::dropIfExists('event_details');
    }
}
