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
        Schema::create('sub_district', function (Blueprint $table) {
            $table->id();
            $table->string('name_sub_district');
            $table->unsignedBigInteger('id_district');
            $table->timestamps();
            
            $table->foreign('id_district')
              ->references('id')->on('district')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_district');
    }
};
