<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'company', 'subject',
        'message', 'product_interest', 'status', 'admin_notes', 'ip_address',
    ];

    public function scopeUnread($q)
    {
        return $q->where('status', 'new');
    }
}