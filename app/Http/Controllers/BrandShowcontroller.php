<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrandShowcontroller extends Controller
{
    public function index(){
        return view('admin.brand.index');
    }
}
