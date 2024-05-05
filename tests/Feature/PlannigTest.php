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
    public function test_set_locale(): void
    {
        $locale = [
            'city' => fake()->city(),
            'state' => fake()->state()
        ];

        $response = $this->postJson(route('planning.setLocale'), $locale);

        $response->assertStatus(200);
        
        $this->assertTrue(Session::has('city'));
        $this->assertEquals($city, Session::get('city'));

        $this->assertTrue(Session::has('state'));
        $this->asserEquals($state, Session::get('state'));

    }
}
