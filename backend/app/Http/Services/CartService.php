<?php

namespace App\Http\Services;
use App\Http\Repository\CartRepository;

class CartService
{
    private $cartRepository;
    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }
    public function addToCart($userId, $productId, $quantity)
    {
        return $this->cartRepository->addToCart($userId, $productId,
            $quantity);
    }
    public function deleteFromCart($userId, $productId)
    {
        return $this->cartRepository->deleteFromCart($userId, $productId);
    }
}


?>