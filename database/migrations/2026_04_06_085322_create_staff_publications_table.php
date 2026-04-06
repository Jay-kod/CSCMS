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
        Schema::create("staff_publications", function (Blueprint $table) {
            $table->id();
            $table->foreignId("staff_id")->constrained("staff")->cascadeOnDelete();
            $table->string("title");
            $table->string("journal")->nullable();
            $table->string("year")->nullable();
            $table->string("url")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_publications');
    }
};
