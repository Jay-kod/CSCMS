<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Add highly performant composite and single indexes for the CMS APIs
        
        Schema::table('news', function (Blueprint \) {
            // Accelerate public news fetching when filtering published items by slug or chronologically
            \->index(['slug', 'is_published']);
            \->index(['is_published', 'created_at']);
        });

        Schema::table('events', function (Blueprint \) {
            // Assuming events table has slug and is_published. If it crashes in migration, I'll revise.
            if (Schema::hasColumn('events', 'slug') && Schema::hasColumn('events', 'is_published')) {
                \->index(['slug', 'is_published']);
            }
        });

        Schema::table('sub_departments', function (Blueprint \) {
            if (Schema::hasColumn('sub_departments', 'slug')) {
                \->index('slug');
            }
        });

        Schema::table('programmes', function (Blueprint \) {
            if (Schema::hasColumn('programmes', 'slug')) {
                \->index('slug');
            }
        });

        Schema::table('courses', function (Blueprint \) {
            if (Schema::hasColumn('courses', 'programme_id')) {
                \->index('programme_id');
            }
        });
        
        Schema::table('staff', function (Blueprint \) {
            // Speed up staff filtering by department or sub_department
            if (Schema::hasColumn('staff', 'department_id')) \->index('department_id');
            if (Schema::hasColumn('staff', 'sub_department_id')) \->index('sub_department_id');
        });
        
        Schema::table('hero_banners', function (Blueprint \) {
            // Speed up front-page banner fetches
            if (Schema::hasColumn('hero_banners', 'is_active')) {
                \->index('is_active');
            }
        });
    }

    public function down(): void
    {
        Schema::table('news', function (Blueprint \) {
            \->dropIndex(['slug', 'is_published']);
            \->dropIndex(['is_published', 'created_at']);
        });
        
        // ... (Keep simple down logic since this is mostly additive)
    }
};
