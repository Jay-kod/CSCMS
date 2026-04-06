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
        Schema::create("association_executives", function (Blueprint $table) {
            $table->id();
            $table->foreignId("association_id")->constrained("association")->cascadeOnDelete();
            $table->string("name");
            $table->string("photo")->nullable();
            $table->string("position")->nullable();
            $table->longText("bio")->nullable();
            $table->string("session_year")->nullable();
            $table->integer("order_position")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('association_executives');
    }
};
