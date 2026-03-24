<?php

namespace App\Http\Services;
use App\Http\Repository\CategoryRepository;

class CategoryService
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function create($name)
    {
        return $this->categoryRepository->createCategory($name);
    }
}
