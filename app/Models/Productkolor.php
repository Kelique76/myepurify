<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productkolor extends Model
{
    use HasFactory;
    protected $table = 'productkolors';
    protected $fillable = ['product_id','color_id','quantity'];

    public function kolor()
    {
        return $this->belongsTo(Color::class, 'color_id','id');
    }
}
