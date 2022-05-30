<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'age_start',
        'age_end',
        'size',
        'description',
        'category_id',
        'brand_id',
        'country_id',
    ];
}
