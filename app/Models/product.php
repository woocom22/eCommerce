<?php

namespace App\Models;

use App\Models\productImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'brand',
        'smaill_description',
        'description',
        'orginal_price',
        'selling_price',
        'quantity',
        'trending',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description'
    ];
    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function productImage(){
        return $this->hasMany(productImage::class, 'product_id', 'id');
    }
}
