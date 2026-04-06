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
        Schema::create("programmes", function (Blueprint $table) {
            $table->id();
            $table->foreignId("sub_department_id")->constrained("sub_departments")->cascadeOnDelete();
            $table->string("level");
            $table->string("title");
            $table->text("description")->nullable();
            $table->string("duration")->nullable();
            $table->text("entry_requirements")->nullable();
            $table->json("career_paths")->nullable();
            $table->boolean("is_active")->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programmes');
    }
};
