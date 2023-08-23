<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\product;
use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\productFormRequest;

class productController extends Controller
{
    public function index(){
        return view('admin.products.index');
    }
    public function create(){
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.create', compact('categories', 'brands'));
    }

    public function store(productFormRequest $request){
        $validatedData = $request->validated();

        $category = Category::findOrFail($validatedData['category_id']);

        $product = $category->products()->create([
        'category_id' => $validatedData['category_id'],
        'name' => $validatedData['name'],
        'slug'=> Str::slug($validatedData['slug']),
        'brand' => $validatedData['brand'],
        'smaill_description' => $validatedData['smaill_description'],
        'description' => $validatedData['description'],
        'orginal_price' => $validatedData['orginal_price'],
        'selling_price' => $validatedData['selling_price'],
        'quantity' => $validatedData['quantity'],
        'trending' => $request->trending== true ? '1': '0',
        'status' => $request->status == true ? '1': '0',
        'meta_title' => $validatedData['meta_title'],
        'meta_keyword' => $validatedData['meta_keyword'],
        'meta_description' => $validatedData['meta_description']
        ]);

        if($request->hasFile('image')){
            $uploadPath = 'uploads/products/';
            $i= 1;
            foreach($request->file('image') as $imageFile){
                $extention = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extention;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.$filename;
                $product->productImage()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }

        // if($request->hasFile('image') ){
        //     $uploadPath = 'uploads/products/';
        //     $file = $request->file('image');
        //     $ext = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$ext;
        //     $file->move($uploadPath, $filename);
        //     $finalImagePathName = $uploadPath.'-'.$filename;


        //     $product->productImage()->create([
        //         'product_id' => $product->id,
        //         'image' => $finalImagePathName,
        //     ]);
        // }



        return redirect()->route('product.index')->with('message', 'Product Added Successfully.');
    }
}
