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
}