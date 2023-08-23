<?php

namespace App\Models;

use App\Models\product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class category extends Model
{
    use HasFactory;
    public function products(){
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}

