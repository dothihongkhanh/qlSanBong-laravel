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
        Schema::create('field_child', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_field');
            $table->string('name_field_child');
            $table->string('type_field_child');
            $table->string('status');
            $table->string('price');
            $table->string('number_star');
            $table->string('avt');
            $table->timestamps();

            $table->foreign('id_field')
              ->references('id')->on('field')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('field_child');
    }
};
