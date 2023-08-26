@extends('admin.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Products<a href="{{ route('product.index') }}"
                                class="btn btn-danger float-end">Back</a></h2>
                    </div>
                    <!-- /resources/views/post/create.blade.php -->
                        @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show ms-4" style="width: 60%" role="alert">
                            <strong>{{session('message')}}</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    <!-- Create Post Form -->
                    <div class="card-body">
                        <form action="{{ url('/dashboard/product/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane" type="button" role="tab"
                                    aria-controls="home-tab-pane" aria-selected="true">
                                    Home
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="seotag-tab" data-bs-toggle="tab"
                                    data-bs-target="#seotag-tab-pane" type="button" role="tab"
                                    aria-controls="seotag-tab-pane" aria-selected="false">
                                    SEO Tags
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="details-tab" data-bs-toggle="tab"
                                    data-bs-target="#details-tab-pane" type="button" role="tab"
                                    aria-controls="details-tab-pane" aria-selected="false">
                                    Details
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="image-tab" data-bs-toggle="tab"
                                    data-bs-target="#image-tab-pane" type="button" role="tab"
                                    aria-controls="image-tab-pane" aria-selected="false">
                                    Product Image
                                </button>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">
                                <div class="md-3 mt-2">
                                    <label for="">Select Category</label>
                                    <select name="category_id" class="form-control" id="">
                                        @foreach($categories as $category)

                                            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected':''}}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="md-3 mt-2">
                                    <label for="">Product Name</label>
                                    <input type="text" name="name" value="{{ $product->name}}" class="form-control">
                                </div>
                                <div class="md-3 mt-2">
                                    <label for="">Slug</label>
                                    <input type="text" name="slug" value="{{ $product->slug}}" class="form-control">
                                </div>
                                <div class="md-3 mt-2">
                                    <label for="">Select Brand</label>
                                    <select name="brand" class="form-control" id="">
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->name }}" {{ $brand->name == $product->brand ? 'selected':'' }}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="md-3 mt-2">
                                    <label for="">Small Description (500 Word)</label>
                                    <input type="text" name="smaill_description" value="{{ $product->smaill_description }}" class="form-control">
                                </div>
                                <div class="md-3 mt-2">
                                    <label for="">Description</label>
                                    <input type="text" name="description" value="{{ $product->description }}" class="form-control">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab"
                                tabindex="0">
                                <div class="md-3 mt-2">
                                    <label for="">Meta Title</Title></label>
                                    <input type="text" name="meta_title" value="{{ $product->meta_title }}" class="form-control">
                                </div>

                                <div class="md-3 mt-2">
                                    <label for="">Meta Keyword</label>
                                    {{-- <input type="text" name="meta_keyword" class="form-control"> --}}
                                    <textarea name="meta_keyword" class="form-control" cols="30" rows="2">{{ $product->meta_keyword }}</textarea>
                                </div>
                                <div class="md-3 mt-2">
                                    <label for="">Meta Description</label>
                                    {{-- <input type="text" name="meta_description" class="form-control"> --}}
                                    <textarea name="meta_description" class="form-control" cols="30" rows="3">{{ $product->meta_description }}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="details-tab-pane" role="tabpanel"
                                aria-labelledby="details-tab" tabindex="0">
                                <div class="md-3 mt-2">
                                    <label for="">Orginal Price</label>
                                    <input type="text" name="orginal_price" value="{{ $product->orginal_price }}" class="form-control">
                                </div>
                                <div class="md-3 mt-2">
                                    <label for="">Selling Price</label>
                                    <input type="text" name="selling_price" value="{{ $product->selling_price }}" class="form-control">
                                </div>
                                <div class="md-3 mt-2">
                                    <label for="">Quantity</label>
                                    <input type="text" name="quantity" value="{{ $product->quantity }}" class="form-control">
                                </div>
                                <div class="col-md-4 d-flex">
                                    <div class="md-1 mt-2 pe-5">
                                        <label for="">Trending</label>
                                        <input type="checkbox" name="trending" {{ $product->trending == '1' ? 'checked': ''}} style="width: 16px; height: 16px;">
                                    </div>
                                    <div class="md-1 mt-2 ">
                                        <label for="">Status</label>
                                        <input type="checkbox" name="status" {{ $product->status == '1' ? 'checked': ''}} style="width: 16px; height: 16px;">
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="image-tab-pane" role="tabpanel"
                                aria-labelledby="image-tab" tabindex="0">
                                <div class="md-3 mt-2">
                                    <label for="">Upload Product Images</label>
                                    <input type="file" multiple name="image[]" class="form-control">
                                </div>
                                <div>
                                    @if ($product->productImage)
                                        <div class="row mt-2">
                                            @foreach ($product->productImage as $image)
                                            <div class="col-md-2">
                                                <img src="{{ asset($image->image)}}" alt="img" style="width: 80px; height:80px;" class="me-4 border border-danger mt-2"/>
                                                <a class="d-block mt-1" href="{{ url('/dashboard/product-image/'.$image->id.'/delete')}}">Remove</a>
                                            </div>
                                            @endforeach
                                        </div>
                                    @else
                                        No Image Fund
                                    @endif
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Update</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
