<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Route;

class ApiHealthTest extends TestCase
{
    /**
     * A basic test to ensure every API route can be hit without a 500 fatal server error.
     */
    public function test_all_api_endpoints_do_not_return_500_errors(): void
    {
        $apiRoutes = collect(Route::getRoutes()->getRoutes())->filter(function ($route) {
            return str_starts_with($route->uri(), 'api/');
        });

        $this->assertNotEmpty($apiRoutes, 'No API routes found to test.');

        foreach ($apiRoutes as $route) {
            $uri = $route->uri();
            
            // Replace generic route parameters {id}, {slug}, etc. with dummy values
            $uri = preg_replace('/\{[A-Za-z0-9_]+\}/', '1', $uri);
            
            // Standardize the URL format
            $url = '/' . ltrim($uri, '/');
            $method = $route->methods()[0];

            if ($method === 'GET') {
                $response = $this->getJson($url);
            } else {
                $response = $this->json($method, $url, []);
            }

            // We expect endpoints to return 200, 422 (validation errors), 
            // 401 (unauthorized), 403 (forbidden), or 404 (not found).
            // We DO NOT expect a 500 (Server Error) normally caused by missing methods or fatal DB errors.
            if ($response->status() >= 500) {
                dump("The API Endpoint [{$method}] {$url} returned a 500 Server Error.");
            }
            $this->assertLessThan(
                500, 
                $response->status(), 
                "The API Endpoint [{$method}] {$url} returned a 500 Server Error. You may be missing a Controller method or have a syntax error."
            );
        }
    }
}
