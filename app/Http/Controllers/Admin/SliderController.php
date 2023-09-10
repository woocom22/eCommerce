<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SliderFormRequest;

class SliderController extends Controller
{
    public function index(){
        $sliders = Slider::all();
        return view('admin.Slider.index', compact('sliders'));
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

    public function edit(Slider $slider){

        return view('admin.Slider.edit', compact('slider'));
    }
    public function update(SliderFormRequest $request, Slider $slider){
            // return $slider; [ this is for display]
            // dd($slider->all());

            $validatedData = $request->validated();
            if($request->hasFile('image')){

                $destination = $slider->image;
                if(File::exists($destination)){
                    File::delete($destination);
                }

                $file = $request->file('image');
                $ext =$file->getClientOriginalExtension();
                $filename = time().'.'.$ext;
                $file->move('upload/slider/', $filename);
                $validatedData['image'] = "upload/slider/$filename";

            }
            Slider::where('id', $slider->id )->update([
                'title' =>$validatedData['title'],
                'description' =>$validatedData['description'],
                'image' =>$validatedData['image'] ?? $slider->image,
                'status' =>$validatedData['status'],
            ]);
            return redirect()->route('slider.index')->with('message', 'Slider Updated Successfully.');
    }
    public function delete(Slider $slider){
        if($slider->count() > 0){
            $destination = $slider->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $slider->delete();
            return redirect()->route('slider.index')->with('message', 'Slider Deleted Successfully.');
        }
        return redirect()->route('slider.index')->with('message', 'Something went wrong.');


    }
}
