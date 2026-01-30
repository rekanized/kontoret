<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Drink extends Model
{
    protected $fillable = [
        'name',
        'description',
        'is_available',
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(DrinkOrder::class);
    }
}
