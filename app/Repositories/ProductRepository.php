<?php

namespace App\Repositories;

use App\Models\Product;
use App\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAll($perPage = 10)
    {
        return Product::orderBy('updated_at', 'desc')->paginate($perPage);
    }

    public function create(array $data): Product
    {
        return Product::create($data);
    }

    public function find(int $id): ?Product
    {
        return Product::find($id);
    }

    public function update(int $id, array $data): bool
    {
        return Product::find($id)->update($data);
    }

    public function delete(int $id): bool
    {
        return Product::find($id)->delete();
    }
}
