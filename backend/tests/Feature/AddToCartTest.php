<?php

use Tests\TestCase;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('add to cart', function() {

    $user = User::factory()->create([
        'password' => bcrypt('password123'),
        'role' => 'user',
    ]);
    $product = Product::factory()->create();
    $response = $this->actingAs($user)->post('/api/addtocart', [
        'product_id' => $product->id,
        'quantity' => 2,
    ]);
    $response->assertStatus(201);
    $this->assertDatabaseHas('cart_items', [
        'product_id' => $product->id,
        'quantity' => 2,
    ]);
});
