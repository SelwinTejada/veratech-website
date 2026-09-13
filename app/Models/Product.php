<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'brand_id', 'name', 'slug', 'summary', 'body',
        'image', 'sku', 'is_active', 'sort_order',
    ];
    protected $casts = ['is_active' => 'bool'];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
}