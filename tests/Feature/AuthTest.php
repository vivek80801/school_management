<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
#use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    private $user;
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = [
            "name" => "user",
            "email" => "user@email.com",
            "password" => "password",
        ];

        User::create(
            [
                "name" => $this->user["name"],
                "email" => $this->user["email"],
                "password" => Hash::make($this->user["password"]),
            ]
        );
    }

    public function test_login (): void
    {
        $response = $this->post("/login", [
            "email" => $this->user["email"],
            "password" => $this->user["password"],
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertStatus(302);
        $response->assertRedirect("dashboard");
    }

    public function test_login_validation_when_email_is_empty():void
    {
        $response = $this->post("/login", [
            "email" => "",
            "password" => $this->user["password"],
        ]);

        $response->assertSessionHasErrors('email');
    }

    public function test_login_validation_when_password_is_empty():void
    {
        $response = $this->post("/login", [
            "email" => $this->user["email"],
            "password" => "",
        ]);

        $response->assertSessionHasErrors('password');
    }

    public function test_login_validation_when_email_and_password_is_empty():void
    {
        $response = $this->post("/login", [
            "email" => "",
            "password" => "",
        ]);

        $response->assertSessionHasErrors(['password', 'email']);
    }
}
