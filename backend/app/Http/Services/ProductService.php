<?php
namespace App\Http\Services;
use App\Http\Repository\ProductRepository;
class ProductService
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function create($name, $description, $price, $stock, $category_id)
    {
        return $this->productRepository->createProduct($name, $description, $price, $stock, $category_id);
    }
    public function update($id, $name, $description, $price, $stock, $category_id)
    {
        return $this->productRepository->updateProduct($id, $name, $description, $price, $stock, $category_id);
    }
    public function delete($id)
    {
        return $this->productRepository->deleteProduct($id);
    }
}
?>