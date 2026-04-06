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
        Schema::create("events", function (Blueprint $table) {
            $table->id();
            $table->foreignId("sub_department_id")->nullable()->constrained("sub_departments")->nullOnDelete();
            $table->string("title");
            $table->string("slug")->unique();
            $table->longText("description")->nullable();
            $table->string("cover_image")->nullable();
            $table->string("venue")->nullable();
            $table->dateTime("start_datetime")->nullable();
            $table->dateTime("end_datetime")->nullable();
            $table->boolean("is_published")->default(false);
            $table->foreignId("created_by")->nullable()->constrained("users")->nullOnDelete();
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
