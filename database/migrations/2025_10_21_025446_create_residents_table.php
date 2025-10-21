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
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('name');
            $table->string('gender')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('barangay');
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->string('house_no')->nullable();
            $table->string('purok')->nullable();
            $table->string('occupation')->nullable();
            $table->string('civil_status')->nullable();
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residents');
    }
};
