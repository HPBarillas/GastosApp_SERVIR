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
        Schema::create('projects_services_donations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('projectId');
            $table->unsignedInteger('serviceId');
            $table->unsignedInteger('donationId')->nullable();
            $table->double('totalService', 8, 2);
            $table->double('totalDonation', 8, 2)->nullable();
            $table->enum('isCompleted',['Y','N']);
            $table->enum('active',['Y','N']);

            $table->foreign('projectId')
                ->references('id')
                ->on('projects');

            $table->foreign('serviceId')
                ->references('id')
                ->on('services');

            $table->foreign('donationId')
                ->references('id')
                ->on('donations');

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
        Schema::dropIfExists('projects_services_donations');
    }
};
