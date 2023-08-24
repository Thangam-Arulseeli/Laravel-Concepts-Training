<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Refactoring Laravel code - Mass assignment
    // 1.1 Mass assignment - fillable 
    // protected $fillable = ['name','age','address','contactno','email','active']; // Related with mass assignment(Insert record using validated variable $data) 
        // White listing the field names

    // 1.2 Mass assignment - guarded - opposit to fillable (Whole record) 
    protected $guarded =[];

    // Refactoring codes SCOPE - Filtering part of query(using Laravel convension)
    public function scopeActive($query){
        return $query->where('active', 1);
    }
    public function scopeInactive($query){
        return $query->where('active', 0);
    }

    // Accessor Format 
    public function getActiveAttribute($attribute){
    //   $status=[
    //       0=>'Inactive',
    //       1=>'Active'
    //   ];
    //   return $status[$attribute]; 

    // Shortest notation of the above code [Accessor Format - Refacoring method]
    // return [
    //     0=>'Inactive',
    //     1=>'Active'
    // ][$attribute];

    // Refactoring..... Using activeOptions()
    return $this->activeOptions()[$attribute]; 

  }

  public function activeOptions(){
    return [ 
       0 => 'Inactive',
       1 => 'Active'
    ];
   }
}

