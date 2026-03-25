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

    public function passCommande($products)
    {
        return $this->commandeRepository->createCommande($products);
    }
}
