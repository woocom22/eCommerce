@extends('admin.master')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Category Form</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item"><a href="{{ route('category.category')}}">Category</a></div>
                <div class="breadcrumb-item">Category Form</div>
            </div>
        </div>

        <div class="section-body">
            <p class="section-lead">
                Create your category
            </p>

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <form method="POST" action="{{ route('category.store')}}">
                            @csrf
                            <div class="card-body d-flex">
                                <div class="form-group col-md-6">
                                    <label>Category Name</label>
                                    <input type="text" name="name" class="form-control" required="">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Status</label>
                                    <select class="form-control" name="status" id="inputEmail4"
                                        aria-label="Default select example">
                                        <option selected>Choose Status</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>

                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Create Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
