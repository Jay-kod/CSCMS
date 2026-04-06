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
        Schema::create("fyp_topics", function (Blueprint $table) {
            $table->id();
            $table->foreignId("sub_department_id")->nullable()->constrained("sub_departments")->nullOnDelete();
            $table->string("title");
            $table->text("description")->nullable();
            $table->string("year")->nullable();
            $table->boolean("is_available")->default(true);
            $table->foreignId("added_by")->nullable()->constrained("users")->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fyp_topics');
    }
};
