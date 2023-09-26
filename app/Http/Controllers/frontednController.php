<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class frontednController extends Controller
{
    public function collection(){
        $sliders = Slider::where('status', 'Active')->get();
        return view('frontend.collections.category.index', compact('sliders'));
    }
}
