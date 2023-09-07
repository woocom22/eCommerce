<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderFormRequest;

class SliderController extends Controller
{
    public function index(){
        $sliers = Slider::all();
        return view('admin.Slider.index', compact('sliers'));
    }
    public function create(){
        return view('admin.Slider.create');
    }
    public function store(SliderFormRequest $request){

        $validatedData = $request->validated();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext =$file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('upload/slider/', $filename);
            $validatedData['image'] = "upload/slider/$filename";

        }
        Slider::create([
            'title' =>$validatedData['title'],
            'description' =>$validatedData['description'],
            'image' =>$validatedData['image'],
            'status' =>$validatedData['status'],
        ]);
        return redirect()->route('slider.index')->with('message', 'Slider Added Successfully.');
    }
}
