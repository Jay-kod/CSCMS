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
        Schema::create("hod_profiles", function (Blueprint $table) {
            $table->id();
            $table->foreignId("department_id")->constrained("departments")->cascadeOnDelete();
            $table->string("name");
            $table->string("photo")->nullable();
            $table->string("qualification")->nullable();
            $table->string("email")->nullable();
            $table->string("phone")->nullable();
            $table->longText("welcome_message")->nullable();
            $table->longText("bio")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hod_profiles');
    }
};
