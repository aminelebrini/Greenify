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
    public function deleteFromCart($userId, $productId)
    {
        $cart = Cart::where('user_id', $userId)->first();
        if ($cart) {
            DB::table('cart_items')
                ->where('cart_id', $cart->id)
                ->where('product_id', $productId)
                ->delete();
            return true;
        }
        return false;
    }
}

?>