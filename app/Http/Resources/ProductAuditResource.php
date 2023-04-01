<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductResource;

class ProductAuditResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'product_id' => $this->product_id,
            'user_id' => $this->user_id,
            'action' => $this->action,
            'old_data' => $this->old_data ? new ProductResource(json_decode($this->old_data)) : '',
            'new_data' => $this->new_data ? new ProductResource(json_decode($this->new_data)) : '',
            'created_at' => $this->created_at
        ];
    }
}
