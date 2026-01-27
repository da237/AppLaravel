<?php

namespace App\Service;

use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductServices
{

    public function getAll(): LengthAwarePaginator
    {
        $query = Product::latest();
        return $query->paginate(Product::PAGINATE);
    }

    public function create(array $data): Product
    {
        return Product::create($data);
    }

    public function find(int $id): ?Product
    {
        return Product::findOrFail($id);
    }

    public function update(Product $product,array $data): bool 
    {
        return $product->update($data);
    }

    public function delete(Product $product): ?bool
    {
        return $product->delete();
    }
}
