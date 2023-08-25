<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\product;
use App\Models\category;
use Illuminate\Support\Str;
use App\Models\productImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\productFormRequest;

class productController extends Controller
{
    public function index(){
        $products = product::all();
        return view('admin.products.index', compact('products'));
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

        return redirect()->route('product.index')->with('message', 'Product Added Successfully.');
    }
    public function edit(int $product_id){
        $categories = Category::all();
        $brands = Brand::all();
        $product = product::findOrFail($product_id);
        return view('admin.products.edit', compact('categories', 'brands', 'product'));
    }
    public function update(productFormRequest $request, int $product_id){
        $validatedData = $request->validated();
        $product = Category::findOrFail($validatedData['category_id'])
                            ->products()->where('id', $product_id)->first();

        if($product)
        {
            $product->update([
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

            return redirect()->route('product.index')->with('message', 'Product Updated Successfully.');
        }else{
            return redirect()->wiht('message', 'No Search Porudct Fund.');
        }
    }

    public function destroyImage(int $product_image_id){
        $productImage = productImage::findOrFail($product_image_id);
        if(File::exists($productImage->image)){
            File::delete($productImage->image);
        }
        $productImage->delete();
        return redirect()->back()->with('message', 'Product image Deleted.');
    }

    public function productDelete(int $product_id){

        $product = Product::findOrFail($product_id);
        if($product->productImage ){
            foreach($product->productImage as $image){
                if(File::exists($image->image)){
                    File::delete($image->image);
                }
            }
        }
        $product->delete();
        return redirect()->back()->with('message', 'Product Deleted with all images.');

    }
}
