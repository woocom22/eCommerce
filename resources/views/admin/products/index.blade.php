@extends('admin.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('message'))

            <div class="alert alert-primary alert-dismissible fade show ms-4" style="width: 60%" role="alert">
                <strong>{{session('message')}}</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <div class="card">
                <div class="card">
                    <div class="card-header">
                        <h2>Products list<a href="{{ route('product.create')}}" class="btn btn-success float-end">Add Product</a></h2>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                               @forelse($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>
                                                @if ($product->category)
                                                {{ $product->category->name }}
                                                @else
                                                    No Category.
                                                @endif
                                            </td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->selling_price }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->status = '1' ? 'Hidden':'Visible' }}</td>
                                            <td class="">
                                                <a href="{{ url('/dashboard/product/'.$product->id.'/edit')}}"><i class="bi bi-pencil-square"></i></a>
                                                <a href="{{ url('/dashboard/product/'.$product->id.'/delete')}}" onclick="return confirm('Are you sure, you want to delete the porduct.')"><i class="bi bi-trash-fill text-danger"></i></a>
                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7">No Products Available</td>
                                            </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
