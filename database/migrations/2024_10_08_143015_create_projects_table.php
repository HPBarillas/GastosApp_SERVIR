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
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('organizationId');
            $table->string('project', 150)->unique();
            $table->string('description', 350);
            $table->date('startDate');
            $table->date('endDate');
            $table->unsignedInteger('countryId');
            $table->unsignedInteger('stateId');
            $table->unsignedInteger('cityId');
            $table->enum('active',['Y','N']);

            $table->foreign('organizationId')
                ->references('id')
                ->on('organizations');

            $table->foreign('countryId')
                ->references('id')
                ->on('countries');

            $table->foreign('stateId')
                ->references('id')
                ->on('states');

            $table->foreign('cityId')
                ->references('id')
                ->on('cities');

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
        Schema::dropIfExists('projects');
    }
};
