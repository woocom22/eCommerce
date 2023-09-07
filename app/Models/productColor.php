<?php

namespace App\Models;

use App\Models\color;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class productColor extends Model
{
    use HasFactory;

    protected $table = 'product_colors';
    protected $fillable = [
        'product_id',
        'color_id',
        'quantity'
    ];

    // public function color(){
    //     return $this->belongsTo(color::class, 'color_id', 'id');
    // }
}
