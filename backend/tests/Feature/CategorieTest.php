<?php
use App\Models\Categorie;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('create category', function () {
     
    $user = User::factory()->create([
        'password' => bcrypt('password123'),
        'role' => 'admin',
    ]);
    
    $response = $this->actingAs($user)->post('/api/createcategorie', [
        'name' => 'Test Category',
    ]);
    $category = Categorie::factory()->create([
        'name' => 'Test Category',
    ]);
    $response->assertStatus(201);
    $this->assertDatabaseHas('categories', [
        'name' => 'Test Category'
    ]);
});
