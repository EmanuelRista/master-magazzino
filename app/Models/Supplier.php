<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    protected $fillable = ['supplier_name', 'address', 'phone', 'email'];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
