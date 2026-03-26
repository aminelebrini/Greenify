<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $userId = auth()->id();
        $cartItem = $this->cartService->addToCart($userId, $request->product_id, $request->quantity);

        if ($cartItem) {
            return response()->json([
                'message' => 'Product added to cart successfully',
                'cart_item' => $cartItem,
            ], 201);
        }

        return response()->json([
            'message' => 'Failed to add product to cart',
        ], 500);
    }
    public function deleteFromCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
        ]);

        $userId = auth()->id();
        $deleted = $this->cartService->deleteFromCart($userId, $request->product_id);

        if ($deleted) {
            return response()->json([
                'message' => 'Product removed from cart successfully',
            ], 200);
        }

        return response()->json([
            'message' => 'Failed to remove product from cart',
        ], 500);
    }
}
