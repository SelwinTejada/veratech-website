<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    protected $fillable = ['title', 'slug', 'summary', 'body', 'icon', 'image', 'is_active', 'sort_order'];
    protected $casts = ['is_active' => 'bool'];
}