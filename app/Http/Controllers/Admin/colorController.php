<?php

namespace App\Http\Controllers\Admin;

use App\Models\color;
use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Requests\colorRequest;
use App\Http\Controllers\Controller;

class colorController extends Controller
{
    public function index(){
        $colors = color::all();
        return view('admin.color.index', compact('colors'));
    }
    public function create(){
        return view('admin.color.create');
    }

    public function store(colorRequest $request){
        $validatedData = $request->validated();
        color::create($validatedData);
        return redirect()->route('color.index')->with('message', 'Color Added Successfully.');
    }

    public function edit(color $color){

        return view('admin.color.edit', compact('color'));
    }

    public function update(colorRequest $request, $color_id){
        $validatedData = $request->validated();
        color::find($color_id)->update($validatedData);
        return redirect()->route('color.index')->with('message', 'Color Updated Successfully.');
    }

    public function destroy($color_id){
        $color = color::findOrFail($color_id);
        $color->delete();
        return redirect()->route('color.index')->with('message', 'Color Deleted Successfully.');
    }


}
