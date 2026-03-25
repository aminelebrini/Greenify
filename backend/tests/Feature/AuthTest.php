<?php
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);


test('login api returns token and success status', function()
{
    $user = User::factory()->create([
        'password' => bcrypt('password123'),
    ]);

    $response = $this->post('/api/login', [
        'email' => $user->email,
        'password' => 'password123',
    ]);

    $response->assertStatus(200);
    $response->assertJsonStructure([
        'token', 
        'user' => [
            'fullname',
            'email'
        ]
    ]);
    $token = $response->json('token');

    
    $authenticatedResponse = $this->withToken($token)
        ->getJson('/api/user'); 

    $authenticatedResponse->assertStatus(200)
        ->assertJsonPath('email', $user->email);
});
