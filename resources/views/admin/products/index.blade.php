@extends('admin.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('message'))
                <h5 class="alert alert-success m-4">{{session('message')}}</h5>
            @endif
            <div class="card">
                <div class="card">
                    <div class="card-header">
                        <h2>Products list<a href="{{ route('product.create')}}" class="btn btn-success float-end">Add Product</a></h2>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
