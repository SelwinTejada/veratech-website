<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Career extends Model
{
    protected $fillable = [
        'title', 'slug', 'department', 'location', 'type',
        'description', 'requirements', 'is_active', 'closes_at',
    ];
    protected $casts = [
        'is_active' => 'bool',
        'closes_at' => 'date',
    ];

    public function applications(): HasMany
    {
        return $this->hasMany(CareerApplication::class);
    }

    public function scopeOpen($q)
    {
        return $q->where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('closes_at')->orWhere('closes_at', '>=', now());
            });
    }
}