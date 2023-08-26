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
                        <h2>Colors Create<a href="{{ route('color.index')}}" class="btn btn-warning float-end">Back</a></h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('color.store')}}" method="POST">
                            @csrf

                                <div class="md-3 mt-2">
                                    <label for="">Color Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="md-3 mt-2">
                                    <label for="">Color Code</label>
                                    <input type="text" name="code" class="form-control">
                                </div>
                                <div class="md-3 mt-2">
                                    <label for="">Status</label>
                                    <input type="checkbox" name="status" />
                                </div>

                            <button type="submit" class="btn btn-primary mt-4">Save Color</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
