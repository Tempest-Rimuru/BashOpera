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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->time('duration');
            $table->unsignedBigInteger('id_age_restriction');
            $table->foreign('id_age_restriction')->references('id')->on('age_restrictions')->onDelete('cascade');
            $table->text('description');
            $table->text('team');
            $table->string('image')->nullable();
            $table->datetime('show_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
