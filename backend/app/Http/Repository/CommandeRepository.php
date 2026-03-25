<?php

namespace App\Http\Repository;
use App\Models\Commande;
class CommandeRepository
{
    public function createCommande($products)
    {
        $commande = Commande::create([
            'products' => json_encode($products),
        ]);
        return $commande;
    }
}



?>