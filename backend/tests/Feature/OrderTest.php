<?php
use App\Models\Order;
use App\Models\User;
use App\Models\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
uses(RefreshDatabase::class);

test('create order', function () {
    $user = User::factory()->create([
        'password' => bcrypt('password123'),
        'role' => 'user'
    ]);
    $product = Product::factory()->create([
        'price' => 100.00,
    ]);
    $response = $this->actingAs($user)
    ->postJson('/api/passcommande', 
        [
            'product_id' => $product->id, 
            'quantity' => 2,
            'price' => 100.00
        ]);

    $response->assertStatus(201);
    $this->assertDatabaseHas('orders', [
        'user_id' => $user->id,
        'total_price' => 200.00,
    ]);
    $this->assertDatabaseHas('order_items', [
        'order_id' => Order::first()->id,
        'product_id' => $product->id,
        'quantity'   => 2,
        'price'      => 100.00
    ]);
});
