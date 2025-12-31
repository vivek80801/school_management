<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_register(): void
    {
        $response = $this->post(route('register'), [
            'name' => 'user1',
            'email' => 'user1@gmail.com',
            'password' => 'Password$123',
            'password_confirmation' => 'Password$123',
        ]);

        $response->assertRedirect(route('login'));
        $this->assertDatabaseHas('users', [
            'name' => 'user1',
            'email' => 'user1@gmail.com',
        ]);
    }

    public function test_register_validation_for_empty_name(): void
    {
        $response = $this->post(route('register'), [
            'name' => '',
            'email' => 'user2@gmail.com',
            'password' => 'Password$123',
            'password_confirmation' => 'Password$123',
        ]);

        $response->assertSessionHasErrors('name');
    }

    public function test_register_validation_for_empty_email(): void
    {
        $response = $this->post(route('register'), [
            'name' => 'user2',
            'email' => '',
            'password' => 'Password$123',
            'password_confirmation' => 'Password$123',
        ]);

        $response->assertSessionHasErrors('email');
    }

    public function test_register_validation_for_empty_password(): void
    {
        $response = $this->post(route('register'), [
            'name' => 'user2',
            'email' => 'user2@gmail.com',
            'password' => '',
            'password_confirmation' => 'Password$123',
        ]);

        $response->assertSessionHasErrors('password');
    }

    public function test_register_validation_for_empty_password_did_not_match_with_confirm_password(): void
    {
        $response = $this->post(route('register'), [
            'name' => 'user2',
            'email' => 'user2@gmail.com',
            'password' => 'Password$123',
            'password_confirmation' => 'Password$124',
        ]);

        $response->assertSessionHasErrors('password');
    }
}
