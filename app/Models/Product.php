<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'price',
        'old_price',
        'description',
    ];

    public function images(){
        return $this
            ->hasMany(Gallery::class, 'parent_id')
            ->select('image','is_main')
            ->orderBy('is_main', 'desc')
        ;
    }

    public function parent(){
        return $this->hasOne(Category::class, 'id','category_id');
    }

    public function params(){
        return $this->hasMany(ProductParams::class, 'product_id');
    }
}
