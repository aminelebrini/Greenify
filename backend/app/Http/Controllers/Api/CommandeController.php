<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Services\CommandeService;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    //khasni nchouf cart_items
    private $commandeService;

    public function __construct(CommandeService $commandeService)
    {
        $this->commandeService = $commandeService;
    }
    public function passCommande(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);
        $userId = auth()->id();
        $commande = $this->commandeService->passCommande(
            $userId,
            $request->product_id,
            $request->quantity,
            $request->price
        );

        if ($commande) {
            return response()->json([
                'message' => 'Commande passed successfully',
                'commande' => $commande,
            ], 201);
        }

        return response()->json([
            'message' => 'Failed to pass commande',
        ], 500);
    }


}
