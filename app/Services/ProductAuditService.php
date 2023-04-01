<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductAudit;
use Illuminate\Support\Facades\Auth;

class ProductAuditService
{
    public function logCreated(Product $product)
    {
        $audit = new ProductAudit();
        $audit->product_id = $product->id;
        $audit->user_id = Auth::check() ? Auth::id() : 1;
        $audit->action = 'created';
        $audit->old_data = null;
        $audit->new_data = json_encode($product->getAttributes());
        $audit->save();
    }

    public function logUpdated(Product $product)
    {
        $audit = new ProductAudit();
        $audit->product_id = $product->id;
        $audit->user_id = Auth::id();
        $audit->action = 'updated';
        $audit->old_data = json_encode($product->getOriginal());
        $audit->new_data = json_encode($product->getAttributes());
        $audit->save();
    }

    public function logDeleted(Product $product)
    {
        $audit = new ProductAudit();
        $audit->product_id = $product->id;
        $audit->user_id = Auth::id();
        $audit->action = 'deleted';
        $audit->old_data = json_encode($product->getOriginal());
        $audit->new_data = null;
        $audit->save();
    }
}
