<?php
namespace App\Http\Repository;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
class CartRepository
{
    public function addToCart($userId, $productId, $quantity)
    {
        $cart = Cart::create([
            'user_id' => $userId
        ]);

        DB::table('cart_items')->insert([
            'cart_id' => $cart->id,
            'product_id' => $productId,
            'quantity' => $quantity,
        ]);

        return $cart;
    }
}

?>