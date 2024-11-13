<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function category(){
        return $this->belongsToMany(Category::class, 'category_products', 'product_id','category_id');
    }
    public function feature(){
        return $this->hasMany(Feature::class);
    }
}
