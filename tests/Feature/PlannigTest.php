<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class PlannigTest extends TestCase
{
    /**
     * A basic feature test example.
     */
     private function postLocale()
     {
        $locale = [
            'city' => fake()->city(),
            'state' => fake()->state(),
            'interests' => ['parks', 'restaurants'],
        ];

        return $this->postJson(route('planning.setLocale'), $locale);
     }

    public function test_payload_get_correct_status(): void
    {

        $response = $this->postLocale();
        $response->assertStatus(200);

    }

    public function test_has_correct_response_body(): void {
        
        $response = $this->postLocale();
        $response_data = $response->json();

        $this->assertArrayHasKey('displayName', $response_data);
    }
}
