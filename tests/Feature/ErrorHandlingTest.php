<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Route;

class ErrorHandlingTest extends TestCase
{
    /**
     * Test that an API 404 (Missing Route) correctly returns a standardized JSON Error.
     */
    public function test_api_404_returns_standard_json(): void
    {
        $response = $this->getJson('/api/this-endpoint-does-not-exist');
        dump($response->getContent());
        // Assert we get a standard 404
        $response->assertStatus(404);
        
        // Assert it returns JSON and not an HTML view
        $response->assertHeader('Content-Type', 'application/json');
    }

    /**
     * Test that a frontend 404 correctly triggers the Application's Catch-All for Vue Router or returns a 404 page.
     */
    public function test_web_404_handling(): void
    {
        $response = $this->get('/this-page-does-not-exist');

        // Vue router catch-all returns 200 from laravel, then Vue handles 404.
        $response->assertStatus(200);
    }

    /**
     * Test that an API 500 (Server Crash) correctly returns a JSON Error Payload instead of dumping HTML.
     */
    public function test_api_500_crash_returns_json_payload(): void
    {
        // Define a temporary route that purposefully throws an Exception
        Route::get('/api/simulate-api-crash', function () {
            throw new \Exception('Simulated API Server Crash for Testing');
        });

        $response = $this->getJson('/api/simulate-api-crash');

        // Assert we get a standard 500 error mapped by Laravel
        $response->assertStatus(500);
        
        // Assert it returns JSON
        $response->assertHeader('Content-Type', 'application/json');
        
        // Ensure "message" is in the response (useful for giving clients crash messages)
        $response->assertJsonStructure(['message']);
    }

    /**
     * Test that a web 500 (Server Crash) correctly returns an HTML Error View.
     */
    public function test_web_500_crash_returns_html_view(): void
    {
        // Define a temporary route that purposefully throws an Exception
        Route::get('/simulate-web-crash', function () {
            throw new \Exception('Simulated Web Server Crash for Testing');
        });

        // Simulating a normal browser visit
        $response = $this->get('/simulate-web-crash');

        // Assert we get a standard 500 status code
        $response->assertStatus(500);
    }
}
