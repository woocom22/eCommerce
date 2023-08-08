@extends('admin.master')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Categories</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item"><a href="{{ route('category.category')}}">Category</a></div>

            </div>
        </div>
        <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Categories Table</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                            <th>Category Name</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($models as $model)
                          <tr>
                            <td>{{ $model->name }}</td>
                            <td>{{ $model->slug }}</td>
                            <td>{{ $model->status }}</td>
                            <td class="">
                                <a class="btn btn-primary" href="{{ route('category.edit', $model->id)}}"><i class="fa fa-pen"></i></a>
                                <a class="btn btn-warning" href="{{ route('category.delete', $model->id)}}"><i class="fa fa-trash"></i></a>
                            </td>
                          </tr>
                           @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

    </section>
</div>

@endsection
