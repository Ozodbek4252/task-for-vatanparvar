<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface ProductServiceInterface
{
    public function getAllProducts();

    public function createProduct(Request $request);

    public function getProductById($productId);

    public function updateProduct(Request $request, $productId);

    public function deleteProduct($productId);
}
