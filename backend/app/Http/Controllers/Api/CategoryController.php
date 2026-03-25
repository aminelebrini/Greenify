<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = $this->categoryService->create($request->name);

        if ($category) {
            return response()->json([
                'message' => 'Category created successfully',
                'category' => $category,
            ], 201);
        }

        return response()->json([
            'message' => 'Failed to create category',
        ], 500);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:categories,id',
            'name' => 'required|string|max:255',
        ]);

        $category = $this->categoryService->update($request->id, $request->name);

        if ($category) {
            return response()->json([
                'message' => 'Category updated successfully',
                'category' => $category,
            ], 200);
        }

        return response()->json([
            'message' => 'Failed to update category',
        ], 500);
    }
    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:categories,id',
        ]);

        $category = $this->categoryService->delete($request->id);

        if ($category) {
            return response()->json([
                'message' => 'Category deleted successfully',
            ], 200);
        }

        return response()->json([
            'message' => 'Failed to delete category',
        ], 500);
    }
}
