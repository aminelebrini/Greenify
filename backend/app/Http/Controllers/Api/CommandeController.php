<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Services\CommandeService;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    private $commandeService;

    public function __construct(CommandeService $commandeService)
    {
        $this->commandeService = $commandeService;
    }
    public function passCommande(Request $request)
    {
        $request->validate([
            'products' => 'required|array',
            'products.*.id' => 'required|integer|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        $commande = $this->commandeService->passCommande($request->products);

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
