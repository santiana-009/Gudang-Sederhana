<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeItems extends Model
{
    use HasFactory;

    protected $guarded  = ['id'];

    public function items(){
        return $this->hasMany(Items::class);
    }

    public function scopeFilter($query, $filters)
    {
        if (isset($filters['search'])) {
            $query->where('name', 'like', '%' . $filters['search'] . '%');
        }
        return $query;
    }
}
