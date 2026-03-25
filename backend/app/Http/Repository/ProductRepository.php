<?php
namespace App\Http\Repository;
use App\Models\Product;

class ProductRepository
{
    public function createProduct($name, $description, $price, $stock, $category_id)
    {
        $product = Product::create([
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'stock' => $stock,
            'category_id' => $category_id,
        ]);
        return $product;
    }
    public function updateProduct($id, $name, $description, $price, $stock, $category_id)
    {
        $product = Product::find($id);
        if (!$product) {
            return null;
        }
        $product->name = $name;
        $product->description = $description;
        $product->price = $price;
        $product->stock = $stock;
        $product->category_id = $category_id;
        $product->save();
        return $product;
    }
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return false;
        }
        $product->delete();
        return true;
    }

}
?>