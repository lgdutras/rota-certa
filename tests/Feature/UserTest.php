<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{

    public function test_register_user(): void
    {
        $user = [
            'id' => fake()->unique()->randomNumber(),
            'name' => fake()->name(),
            'password' => fake()->password(),
            'email' => fake()->email()
        ];

        $response = $this->postJson(route('user.register'), $user);

        $response->assertStatus(200);

        $this->assertDatabaseHas('users', $user);
        
    }
}
