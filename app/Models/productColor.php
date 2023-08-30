<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productColor extends Model
{
    use HasFactory;

    protected $table = 'product_colors';
    protected $fillable = [
        'product_id',
        'color_id',
        'quantity'
    ];
}
