@extends('admin.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card">
                    <div class="card-header">
                        <h2>Colors list<a href="{{ route('color.create') }}"
                                class="btn btn-success float-end">Add Color</a></h2>
                    </div>
                    @if(session()->has('message'))

                        <div class="alert alert-primary alert-dismissible fade show mx-4" role="alert">
                            <strong>{{ session('message') }}</strong><button type="button"
                                class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($colors as $color)
                                    <tr>
                                         <td>{{ $color->id }}</td>
                                         <td>{{ $color->name }}</td>
                                         <td>{{ $color->code }}</td>
                                        <td>{{ $color->status }}</td>
                                        <td class="">
                                            <a
                                                href="{{ url('dashboard/color/'.$color->id.'/edit')}}"><i
                                                    class="bi bi-pencil-square"></i></a>
                                            <a href="{{ url('dashboard/color/'.$color->id.'/delete')}}"
                                                onclick="return confirm('Are you sure, you want to delete the color.')"><i
                                                    class="bi bi-trash-fill text-danger"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No Color Available</td>
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
