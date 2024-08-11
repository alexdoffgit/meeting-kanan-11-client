<?php

namespace Tests\Feature;

use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(UserSeeder::class);
    }

    public function test_can_visit_login_page(): void
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
    }

    public function test_can_authenticate_user()
    {
        $credentials = [
            'email' => 'adi',
            'password' => 'adi'
        ];

        $response = $this->post(route('login.submit'), $credentials);

        $response->assertRedirectToRoute('home');
    }
}
