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

    public function produkGbr()
    {
       return $this->hasMany(Images::class,'product_id','id');
    }

    public function produkColor()
    {
       return $this->hasMany(Productkolor::class,'product_id','id');
    }

    public function categornya()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
