<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|integer|exists:categories,id',
        ]);
        $product = $this->productService->create($request->name,
            $request->description,
            $request->price,
            $request->stock,
            $request->category_id
        );

        if ($product) {
            return response()->json([
                'message' => 'Product created successfully',
                'product' => $product,
            ], 201);
        }

        if ($product) {
            return response()->json([
                'message' => 'Product created successfully',
                'product' => $product,
            ], 201);
        }

        return response()->json([
            'message' => 'Failed to create product',
        ], 500);
    }
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:products,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        $product = $this->productService->update($request->id,
            $request->name,
            $request->description,
            $request->price,
            $request->stock,
            $request->category_id
        );

        if ($product) {
            return response()->json([
                'message' => 'Product updated successfully',
                'product' => $product,
            ], 200);
        }

        return response()->json([
            'message' => 'Failed to update product',
        ], 500);
    }
    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:products,id',
        ]);

        $product = $this->productService->delete($request->id);

        if ($product) {
            return response()->json([
                'message' => 'Product deleted successfully',
            ], 200);
        }

        return response()->json([
            'message' => 'Failed to delete product',
        ], 500);
    }   
}
