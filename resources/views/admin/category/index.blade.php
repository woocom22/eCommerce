@extends('admin.master')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header mt-2">
            <h1>Categories <a href="{{ route('category.create')}}" class="btn btn-primary float-end">Add Category</a></h1>
            <div class="section-header-breadcrumb d-flex mt-2">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item"><a href="{{ route('category.category')}}">Category</a></div>

            </div>
        </div>
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Category Table</h5>
                @if(session()->has('message'))

                <div class="alert alert-primary alert-dismissible fade show mx-4" role="alert">
                    <strong>{{ session('message') }}</strong><button type="button"
                        class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
              <!-- Table Variants -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Status</th>
                    <th scope="col">Active</th>
                  </tr>
                </thead>
                <tbody>
                            @foreach ($models as $model)
                          <tr>
                            <td>{{ $model->name }}</td>
                            <td>{{ $model->slug }}</td>
                            <td>{{ $model->status }}</td>
                            <td class="">
                                <a href="{{ route('category.edit', $model->id)}}"><i class="bi bi-pencil-square"></i></a>
                                <a href="{{ route('category.delete', $model->id)}}"><i class="bi bi-trash-fill text-danger"></i></a>
                            </td>
                          </tr>
                           @endforeach
                        </tbody>
              </table>
              <!-- End Table Variants -->

            </div>
          </div>

    </section>
</div>

@endsection
