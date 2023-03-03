<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table ="products";
    protected $fillable = [
        'title' ,
        'price' ,
        'min_qty' ,
        'discount_price' ,
        'discount_start_date' ,
        'discount_end_date' ,
        'image' ,
        'photos' ,
        'details' ,
        'category_id' ,
        'vodeo' ,
        'size_id' ,
        'tags' ,
        'publish' ,
        'featured' ,
        'rating' ,
        'display',
    ];
    public function categories()
    {
        return $this->hasMany(CategoryProduct::class);
    }

    public function category_products(){
        return $this->hasMany(CategoryProduct::class);
    }
}
