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
                        <h2>Colors Edit<a href="{{ route('color.index')}}" class="btn btn-warning float-end">Back</a></h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('dashboard/color/'.$color->id )}}" method="POST">
                            @csrf
                            @method('PUT')
                                <div class="md-3 mt-2">
                                    <label for="">Color Name</label>
                                    <input type="text" name="name" value="{{ $color->name}}" class="form-control">
                                </div>
                                <div class="md-3 mt-2">
                                    <label for="">Color Code</label>
                                    <input type="text" name="code" value="{{ $color->code}}" class="form-control">
                                </div>
                                <div class="md-3 mt-2">
                                    <label for="">Status</label>
                                    <input type="checkbox" {{ $color->status ? 'checked':''}} name="status" />
                                </div>

                            <button type="submit" class="btn btn-primary mt-4">Update Color</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
