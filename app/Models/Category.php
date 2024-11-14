<?php

namespace App\Models;

// Category.php
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_products', 'category_id', 'product_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {

            $category->products()->each(function ($product) {

                $product->feature()->delete();

                $product->delete();
            });
        });
    }
}
