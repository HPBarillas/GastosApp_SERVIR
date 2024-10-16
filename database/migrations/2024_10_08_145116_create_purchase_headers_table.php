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
        Schema::create('purchase_headers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description', 350);
            $table->string('proveedor', 350);
            $table->unsignedInteger('projectId');
            $table->enum('status',['O','C','P']);
            $table->date('dueDate');

            $table->foreign('projectId')
                ->references('id')
                ->on('projects');

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
        Schema::dropIfExists('purchase_headers');
    }
};
