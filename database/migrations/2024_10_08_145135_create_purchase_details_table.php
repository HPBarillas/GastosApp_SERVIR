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
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('headerId');
            $table->unsignedInteger('projectServiceDonationId');
            $table->integer('units');
            $table->double('unitsPrice', 8, 2);
            $table->double('total', 8, 2);

            $table->foreign('headerId')
                ->references('id')
                ->on('purchase_headers');

            $table->foreign('projectServiceDonationId')
                ->references('id')
                ->on('projects_services_donations');

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
        Schema::dropIfExists('purchase_details');
    }
};
