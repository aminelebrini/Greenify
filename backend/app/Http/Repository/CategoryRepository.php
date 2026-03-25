<?php

namespace App\Http\Repository;

use App\Models\Categorie;

class CategoryRepository
{
	public function createCategory($name)
	{
		return Categorie::create([
			'name' => $name,
		]);
	}
	public function updateCategory($id, $name)
	{
		$category = Categorie::find($id);
		if (!$category) {
			return null;
		}
		$category->name = $name;
		$category->save();
		return $category;
	}
	public function deleteCategory($id)
	{
		$category = Categorie::find($id);
		if (!$category) {
			return false;
		}
		return $category->delete();
	}
}