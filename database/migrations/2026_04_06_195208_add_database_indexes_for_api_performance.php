<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Add highly performant composite and single indexes for the CMS APIs
        
        Schema::table('news', function (Blueprint $table) {
            // Accelerate public news fetching when filtering published items by slug or chronologically
            $table->index(['slug', 'is_published']);
            $table->index(['is_published', 'created_at']);
        });

        Schema::table('events', function (Blueprint $table) {
            // Assuming events table has slug and is_published. If it crashes in migration, I'll revise.
            if (Schema::hasColumn('events', 'slug') && Schema::hasColumn('events', 'is_published')) {
                $table->index(['slug', 'is_published']);
            }
        });

        Schema::table('sub_departments', function (Blueprint $table) {
            if (Schema::hasColumn('sub_departments', 'slug')) {
                $table->index('slug');
            }
        });

        Schema::table('programmes', function (Blueprint $table) {
            if (Schema::hasColumn('programmes', 'slug')) {
                $table->index('slug');
            }
        });

        Schema::table('courses', function (Blueprint $table) {
            if (Schema::hasColumn('courses', 'programme_id')) {
                $table->index('programme_id');
            }
        });
        
        Schema::table('staff', function (Blueprint $table) {
            if (Schema::hasColumn('staff', 'department_id')) $table->index('department_id');
            if (Schema::hasColumn('staff', 'sub_department_id')) $table->index('sub_department_id');
        });
        
        Schema::table('hero_banners', function (Blueprint $table) {
            if (Schema::hasColumn('hero_banners', 'is_active')) $table->index('is_active');
        });
    }

    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropIndex(['slug', 'is_published']);
            $table->dropIndex(['is_published', 'created_at']);
        });
    }
};
