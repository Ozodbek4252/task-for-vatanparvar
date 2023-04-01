<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\ProductAuditService;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getTotalPriceWithVatAttribute()
    {
        $vat = config('app.vat', 0.0);
        return $this->qty * $this->price * (1 + $vat);
    }

    public function audits()
    {
        return $this->hasMany(ProductAudit::class);
    }

    protected static function booted()
    {
        static::created(function ($product) {
            app(ProductAuditService::class)->logCreated($product);
        });

        static::updated(function ($product) {
            app(ProductAuditService::class)->logUpdated($product);
        });

        static::deleted(function ($product) {
            app(ProductAuditService::class)->logDeleted($product);
        });
    }
}
