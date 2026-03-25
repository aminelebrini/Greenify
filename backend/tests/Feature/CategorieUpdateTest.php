<?php
use App\Models\Categorie;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('update category', function () {

    $user = User::factory()->create([
        'password' => bcrypt('password123'),
        'role' => 'admin',
    ]);
    $category = Categorie::factory()->create([
        'name' => 'Original Category',
    ]);
    $response = $this->actingAs($user)->put('/api/updatecategorie', [
        'id' => $category->id,
        'name' => 'Updated Category',
    ]);

    $response->assertStatus(200);
    $this->assertDatabaseHas('categories', [
        'id' => $category->id,
        'name' => 'Updated Category',
    ]);
});
