<?php
namespace App\Http\Services;
use App\Http\Repository\CommandeRepository;

class CommandeService
{
    private $commandeRepository;

    public function __construct(CommandeRepository $commandeRepository)
    {
        $this->commandeRepository = $commandeRepository;
    }

    public function passCommande($userId, $productId , $quantity, $price)
    {
        return $this->commandeRepository->createCommande($userId, $productId , $quantity, $price);
    }
}
