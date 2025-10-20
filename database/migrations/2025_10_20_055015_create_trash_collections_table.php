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
        Schema::create('trash_collections', function (Blueprint $table) {
            $table->id();
            $table->integer('collection_date');
            $table->integer('collection_barangay');
            $table->integer('collection_kilogram');
            $table->integer('collection_type');
            $table->integer('collection_driver');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trash_collections');
    }
};
