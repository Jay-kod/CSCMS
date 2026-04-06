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
        Schema::create("staff", function (Blueprint $table) {
            $table->id();
            $table->foreignId("department_id")->constrained("departments")->cascadeOnDelete();
            $table->foreignId("sub_department_id")->nullable()->constrained("sub_departments")->nullOnDelete();
            $table->string("name");
            $table->string("slug")->unique();
            $table->string("photo")->nullable();
            $table->string("email")->nullable();
            $table->string("phone")->nullable();
            $table->string("qualification")->nullable();
            $table->string("designation")->nullable();
            $table->longText("bio")->nullable();
            $table->boolean("is_hod")->default(false);
            $table->boolean("is_active")->default(true);
            $table->integer("order_position")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
