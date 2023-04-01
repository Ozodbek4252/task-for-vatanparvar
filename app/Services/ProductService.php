<?php

namespace App\Services;

use App\Interfaces\ProductRepositoryInterface;
use App\Interfaces\ProductServiceInterface;
use Illuminate\Http\Request;

class ProductService implements ProductServiceInterface
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllProducts($perPage = 10)
    {
        return $this->productRepository->getAll($perPage);
    }

    public function createProduct(Request $request)
    {
        $productData = $request->all();
        return $this->productRepository->create($productData);
    }

    public function getProductById($id)
    {
        return $this->productRepository->find($id);
    }

    public function updateProduct(Request $request, $productId)
    {
        $productData = $request->all();
        return $this->productRepository->update($productId, $productData);
    }

    public function deleteProduct($productId)
    {
        return $this->productRepository->delete($productId);
    }
}
