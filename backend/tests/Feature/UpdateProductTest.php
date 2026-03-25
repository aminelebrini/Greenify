<?php
use App\Models\Categorie;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('update product', function () {

    $user = User::factory()->create([
        'password' => bcrypt('password123'),
        'role' => 'admin',
    ]);
    $category = Categorie::factory()->create();
    $product = Product::factory()->create([
        'name' => 'Original Product',
        'description' => 'This is the original product.',
        'price' => 19.99,
        'stock' => 10,
        'category_id' => $category->id, 
    ]);
    $response = $this->actingAs($user)->put('/api/updateproduct', [
        'id' => $product->id,
        'name' => 'Updated Product',
        'description' => 'This is the updated product.',
        'price' => 29.99,
        'stock' => 5,
        'category_id' => $category->id, 
    ]);

    $response->assertStatus(200);
    $this->assertDatabaseHas('products', [
        'id' => $product->id,
        'name' => 'Updated Product',
        'description' => 'This is the updated product.',
        'price' => 29.99,
        'stock' => 5,
        'category_id' => $category->id, 
    ]);
});
