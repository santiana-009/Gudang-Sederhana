<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutgoingsEnd extends Model
{
    use HasFactory;

    protected $guarded  = ['id'];

    public function scopeFilter($query, $filters)
    {
        if (isset($filters['search'])) {
            $query->where('current_date', 'like', '%' . $filters['search'] . '%');
        }
        return $query;
    }
}
