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
        Schema::create('order_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_order');
            $table->unsignedBigInteger('id_field_child');
            $table->time('time_start', $precision = 0);
            $table->time('time_end', $precision = 0); 
            $table->string('time_order');
            $table->text('note');
            $table->timestamps();

            $table->foreign('id_order')
              ->references('id')->on('order')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_field_child')
            ->references('id')->on('field_child')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_detail');
    }
};
