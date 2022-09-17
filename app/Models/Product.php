<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'brand',
        'small_desc',
        'desc',
        'ori_price',
        'selli_price',
        'quantity',
        'trending',
        'status',
        'meta_title',
        'meta_key',
        'meta_desc',

    ];
}
