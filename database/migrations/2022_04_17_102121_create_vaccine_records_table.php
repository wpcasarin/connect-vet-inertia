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
        Schema::enableForeignKeyConstraints();

        Schema::create('vaccine_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pet_id')->constrained();
            $table->foreignId('vet_id')->references('id')->on('users')->constrained();
            $table->string('name');
            $table->dateTime('next_dose');
            $table->softDeletes();
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
        Schema::dropIfExists('vaccine_records');
    }
};
