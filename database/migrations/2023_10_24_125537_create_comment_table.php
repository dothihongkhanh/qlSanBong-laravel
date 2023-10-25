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
        Schema::create('comment', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->unsignedBigInteger('id_field_child');
            $table->string('time');
            $table->string('star');
            $table->text('content');
            $table->timestamps();

            $table->foreign('id_field_child')
              ->references('id')->on('field_child')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('username')
            ->references('username')->on('user')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment');
    }
};
