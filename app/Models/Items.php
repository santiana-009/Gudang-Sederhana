<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    protected $guarded  = ['id'];

    public function typeitem() {
        return $this->belongsTo(TypeItems::class,'type_item');
    }

    public function scopeFilter($query, $filters)
    {
        if (isset($filters['search'])) {
            $query->where('name_item', 'like', '%' . $filters['search'] . '%');
        }
        return $query;
    }
}
