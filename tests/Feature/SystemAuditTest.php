<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\News;
use Spatie\Permission\Models\Role;
use Database\Seeders\RoleAndPermissionSeeder;

class SystemAuditTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        // Run the seeder to have the required roles
        $this->seed(RoleAndPermissionSeeder::class);
    }

    /**
     * 1. The Role-Based Authorization Breach Test
     * A department admin tries to breach a super admin route.
     * Expected: 403 Forbidden.
     */
    public function test_department_admin_cannot_access_super_admin_routes()
    {
        // Act as a newly created Department Admin
        $admin = User::firstOrCreate(
            ['email' => 'testadmin@example.com'],
            ['name' => 'Test Admin', 'password' => bcrypt('password')]
        );
        $admin->assignRole('dept_admin');

        // Attempting to breach Super Admin "users" management
        $response = $this->actingAs($admin)->getJson('/api/super-admin/users');

        // Assert they are forcefully forbidden
        $response->assertStatus(403);
    }

    /**
     * 2. The Full-Lifecycle Content Publishing Workflow
     * Super Admin or Admin publishes an article. A guest views it, then reacts.
     */
    public function test_full_lifecycle_content_publishing_and_guest_reaction()
    {
        // A) Create a Super Admin and act as them
        $superAdmin = User::factory()->create();
        $superAdmin->assignRole('super_admin');

        // B) Super Admin publishes a news article to the backend
        $newsData = [
            'author_id' => $superAdmin->id,
            'title' => 'Breakthrough in AI Research at NSUK',
            'slug' => 'ai-research-nsuk',
            'content' => 'We are proud to announce a new milestone in Artificial Intelligence...',
            'image' => '/storage/test.png',
            'type' => 'news', // Default enum
            'is_published' => true,
        ];

        // Directly persist to DB to bypass mock images in controller for testing
        // (If we had a mocked POST endpoint for news we'd hit /api/admin/news instead)
        $article = News::create($newsData);

        // C) The Guest loads the Public Frontend News API Endpoint
        $publicResponse = $this->getJson('/api/news/ai-research-nsuk');
        
        // Assert the guest can read the published article
        $publicResponse->assertStatus(200)
                       ->assertJsonPath('data.title', 'Breakthrough in AI Research at NSUK');

        // D) Guest Reacts to the article (Likes it)
        $reactionResponse = $this->postJson("/api/news/{$article->slug}/react", [
            'reaction_type' => 'like',
        ]);

        $reactionResponse->assertStatus(200);

        // E) Verify the Like count incremented in the database
        $this->assertDatabaseHas('news_reactions', [
            'news_id' => $article->id,
            'reaction_type' => 'like'
        ]);
    }
}
