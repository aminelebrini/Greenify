<?php

use App\Models\Categorie;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('delete category', function () {

    $user = User::factory()->create([
        'password' => bcrypt('password123'),
        'role' => 'admin',
    ]);
    $category = Categorie::factory()->create([
        'name' => 'Category to Delete',
    ]);
    $response = $this->actingAs($user)->delete('/api/deletecategorie', [
        'id' => $category->id,
    ]);

    $response->assertStatus(200);
    $this->assertDatabaseMissing('categories', [
        'id' => $category->id,
    ]);
});
