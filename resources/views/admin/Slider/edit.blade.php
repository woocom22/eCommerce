@extends('admin.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('message'))

            <div class="alert alert-primary alert-dismissible fade show ms-4" role="alert">
                <strong>{{session('message')}}</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <div class="card">
                <div class="card">
                    <div class="card-header">
                        <h2>Add Slider<a href="{{ route('slider.index')}}" class="btn btn-danger float-end">Back</a></h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('dashboard/slider/'.$slider->id )}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{ $slider->id }}" name="id">
                                <div class="md-3 mt-2">
                                    <label for="">Slider Title</label>
                                    <input type="text" value="{{ $slider->title}}" name="title" class="form-control">
                                </div>
                                <div class="md-3 mt-2">
                                    <label for="">Description</label>
                                    <input type="text" value="{{ $slider->description}}" name="description" class="form-control">
                                </div>
                                <div class="md-3 mt-2">
                                    <label for="">Upload Product Images</label>
                                    <input type="file" multiple name="image" class="form-control">
                                    <img src="{{ asset( "$slider->image" ) }}" style="width:70px; height:70px" alt="" />
                                </div>
                                <div class="md-3 mt-2">
                                    <label class="my-2" for="">Color Status</label>
                                    <select class="form-control" name="status" id="inputEmail4"
                                        aria-label="Default select example">
                                        <option selected>Choose Status</option>
                                        <option {{ $slider->status == 'Active'?'selected':''}} value="Active">Active</option>
                                        <option {{ $slider->status == 'Inactive'?'selected':''}} value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            <button type="submit" class="btn btn-primary mt-4">Update Slider</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
