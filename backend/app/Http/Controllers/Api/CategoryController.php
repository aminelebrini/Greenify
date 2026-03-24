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
}
