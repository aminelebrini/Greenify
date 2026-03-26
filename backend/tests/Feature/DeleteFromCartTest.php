<?php

use Tests\TestCase;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

uses(RefreshDatabase::class);

test('delete from cart', function() {

    $user = User::factory()->create([
        'password' => bcrypt('password123'),
        'role' => 'user',
    ]);
    $product = Product::factory()->create();
    $cart = Cart::factory()->create([
        'user_id' => $user->id,
    ]);
    DB::table('cart_items')->insert([
        'cart_id' => $cart->id,
        'product_id' => $product->id,
        'quantity' => 2
    ]);

    $response = $this->actingAs($user)->delete('/api/deletefromcart', [
        'product_id' => $product->id,
    ]);
    $response->assertStatus(200);
    $this->assertDatabaseMissing('cart_items', [
        'cart_id' => $cart->id,
        'product_id' => $product->id
    ]);
});
