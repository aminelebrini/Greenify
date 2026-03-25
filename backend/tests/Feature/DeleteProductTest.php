<?php
use App\Models\Categorie;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('delete product', function () {

    $user = User::factory()->create([
        'password' => bcrypt('password123'),
        'role' => 'admin',
    ]);
    $category = Categorie::factory()->create();
    $product = Product::factory()->create([
        'name' => 'Product to Delete',
        'description' => 'This is a product to delete.',
        'price' => 29.99,
        'stock' => 5,
        'category_id' => $category->id, 
    ]);
    $response = $this->actingAs($user)->delete('/api/deleteproduct', [
        'id' => $product->id,
        'message' => 'Product deleted successfully',
    ]);

    $response->assertStatus(200);
    $this->assertDatabaseMissing('products', [
        'id' => $product->id,
    ]);
});


