<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    protected $fillable = [
        'store_id',
        'product_id',
        'quantity',
    ];
    public function products(){
        return $this->hasMany(Product::class,'product_id');
    }
    public function stores(){
        return $this->hasMany(Store::class,'store_id');
    }
}
