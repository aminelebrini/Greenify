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
    public function update($id, $name)
    {
        return $this->categoryRepository->updateCategory($id, $name);
    }
    public function delete($id)
    {
        return $this->categoryRepository->deleteCategory($id);
    }
}
