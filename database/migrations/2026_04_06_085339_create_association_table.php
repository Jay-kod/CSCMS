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
        Schema::create("association", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("short_description")->nullable();
            $table->longText("full_description")->nullable();
            $table->text("vision")->nullable();
            $table->text("mission")->nullable();
            $table->string("logo")->nullable();
            $table->string("founded_year")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('association');
    }
};
