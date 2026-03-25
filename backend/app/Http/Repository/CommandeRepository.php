<?php

namespace App\Http\Repository;
use App\Models\Order;
use App\Events\OrderPlaced;
use Illuminate\Support\Facades\DB;
class CommandeRepository
{
    public function createCommande($userId, $productId , $quantity, $price)
    {
        $calculatedPrice = $quantity * $price;

        $totalPrice = $quantity * $price;
        $commande = Order::create([
            'user_id' => $userId,
            'total_price' => $calculatedPrice,
            'status' => 'pending',
        ]);
        $commande->products()->attach($productId, [
                'quantity' => $quantity,
                'price' => $price,
            ]);

        $commande->load('products');

        event(new OrderPlaced($commande));
        return $commande;
    }
}



?>