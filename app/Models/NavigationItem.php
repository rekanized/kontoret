<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NavigationItem extends Model
{
    protected $fillable = [
        'name',
        'order',
        'parent_id',
        'route',
        'icon',
        'color'
    ];

    public function parent()
    {
        return $this->belongsTo(NavigationItem::class, 'parent_id', 'id');
    }

    // Define the children relationship (hasMany)
    public function children()
    {
        return $this->hasMany(NavigationItem::class, 'parent_id', 'id');
    }
}