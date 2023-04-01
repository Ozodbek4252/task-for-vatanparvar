<?php

namespace App\Interfaces;

use App\Models\Product;

interface ProductRepositoryInterface
{
    public function getAll();

    public function create(array $data): Product;

    public function find(int $id): ?Product;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}
