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
        Schema::create('comment_image', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_comment');
            $table->unsignedBigInteger('id_image');
            $table->timestamps();

            $table->foreign('id_comment')
              ->references('id')->on('comment')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_image')
            ->references('id')->on('image')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_image');
    }
};
