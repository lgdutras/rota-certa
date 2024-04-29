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
            'name' => fake()->name(),
            'password' => bcrypt(fake()->password()),
            'email' => fake()->email()
        ];

        $response = $this->postJson(route('user.register'), $user);

        $response->assertStatus(201);

        $this->assertDatabaseHas('users', $user);
        
    }
}
