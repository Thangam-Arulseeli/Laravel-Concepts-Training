<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Refactoring codes SCOPE - Filtering part of query(using Laravel convension)
    public function scopeActive($query){
        return $query->where('active', 1);
    }
    public function scopeInactive($query){
        return $query->where('active', 0);
    }
}
