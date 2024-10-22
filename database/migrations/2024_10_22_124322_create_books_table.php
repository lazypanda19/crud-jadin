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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('author');
            $table->string('genre');
            $table->integer('year');
            $table->text('description');
            $table->integer('rating');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
