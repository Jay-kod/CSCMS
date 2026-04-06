<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AlertConfirmationResponseTest extends TestCase
{
    /**
     * Test that successful actions return a 'message' key.
     * This is required by the Vue SweetAlert/Toast frontend interceptors to display "Success" dialogs.
     */
    public function test_api_returns_success_message_payload_for_frontend_alerts(): void
    {
        // Submitting the contact form successfully
        $response = $this->postJson('/api/contact', [
            'name' => 'John student',
            'email' => 'john.s@example.com',
            'message' => 'I would like to inquire about the CS program.',
        ]);

        $response->assertStatus(200);
        
        // Ensure the global interceptor can pick up the 'message' field
        $response->assertJsonStructure(['message']);
        
        // Optionally assert the exact text our controller set
        $response->assertJsonPath('message', 'Your message has been sent successfully. We will get back to you soon.');
    }

    /**
     * Test that validation failures return standard 422 with a 'message' and 'errors' array.
     * This is required by the Vue Vee-Validate and SweetAlert logic to map field errors and generic toaster errors.
     */
    public function test_api_returns_validation_error_alerts_on_bad_input(): void
    {
        // Submitting with missing 'email' and 'message'
        $response = $this->postJson('/api/contact', [
            'name' => 'Just Name, No Email'
        ]);

        $response->assertStatus(422);

        // Ensure Laravel provides 'message' (for global toaster) and 'errors' (for field mapping)
        $response->assertJsonStructure([
            'message',
            'errors' => [
                'email',
                'message'
            ]
        ]);
    }
}
