<?php
use App\Models\User;
use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Foundation\Testing\RefreshDatabase;
uses(RefreshDatabase::class);

test('create product', function () {
     
    $user = User::factory()->create([
        'password' => bcrypt('password123'),
        'role' => 'admin',
    ]);
    $category = Categorie::factory()->create();
    
    $response = $this->actingAs($user)->post('/api/createproduct', [
        'name' => 'Test Product',
        'description' => 'This is a test product.',
        'price' => 19.99,
        'stock' => 10,
        'category_id' => $category->id, 
    ]);
    $product = Product::factory()->create([
        'name' => 'Test Product',
        'description' => 'This is a test product.',
        'price' => 19.99,
        'stock' => 10,
        'category_id' => 1, 
    ]);
    $response->assertStatus(201);
    $this->assertDatabaseHas('products', [
        'name' => 'Test Product',
        'description' => 'This is a test product.',
        'price' => 19.99,
        'category_id' => 1, 
    ]);
});