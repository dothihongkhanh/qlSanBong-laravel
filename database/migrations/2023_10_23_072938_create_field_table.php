<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('field', function (Blueprint $table) {
            $table->id();
            $table->string('name_field');
            $table->string('username');
            $table->unsignedBigInteger('id_sub_district');
            $table->text('description');
            $table->string('address');
            $table->string('locate');
            $table->time('time_open', $precision = 0);
            $table->time('time_close', $precision = 0);
            $table->string('price');
            $table->timestamps();

            $table->foreign('id_sub_district')
              ->references('id')->on('sub_district')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('username')
            ->references('username')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('field');
    }
};
