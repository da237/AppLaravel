<?php

namespace App\Service;

use App\Models\Category;


class CategoryService
{

    public function getAll()
    {
        return Category::latest()->paginate(10);
    }


    public function create(array $data): Category
    {
        return Category::create($data);
    }


    public function find(int $id): ? Category 
    {
        return Category::findOrFail($id);
    }

    public function update(Category $category, array $data): bool
    {
        return $category->update($data);
    }

    public function delete(Category $category): bool
    {
        return $category->delete();
    }
}
