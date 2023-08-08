<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category(){
        $models = category::all();
        return view('admin.category.index', compact('models'));
    }
    public function create(){
        return view('admin.category.createform');
    }
    public function store(Request $request){
        $model = new category;
        $model->name = $request->name;
        $model->slug = Str::slug($request->name);
        $model->status = $request->status;
        $model->save();

        return redirect()->route('category.category')->with('message', 'Category Insert Successfully');
    }
    public function delete($id){
        $model = category::findOrFail($id);
        $model->delete();
        return redirect()->route('category.category')->with('message', 'Category Delete Successfully');
    }
    public function edit($id){
        $model = category::findOrFail($id);
        return view('admin.category.edit', compact('model'));
    }
    public function update(Request $request){
        $model = category::findOrFail($request->id);
        $model->name = $request->name;
        $model->slug = Str::slug($request->name);
        $model->status = $request->status;
        $model->save();
        return redirect()->route('category.category')->with('message', 'Category Delete Successfully');
    }

}
