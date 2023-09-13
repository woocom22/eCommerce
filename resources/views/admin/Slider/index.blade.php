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
                        <h2>Slider list<a href="{{ route('slider.create')}}" class="btn btn-success float-end">Add Slider</a></h2>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                               @forelse($sliders as $slider)
                                        <tr>
                                            <td>{{ $slider->id }}</td>
                                            {{-- <td>
                                                @if ($slider->category)
                                                {{ $slider->category->name }}
                                                @else
                                                    No Category.
                                                @endif
                                            </td> --}}
                                            <td>{{ $slider->title }}</td>
                                            <td>{{ $slider->description }}</td>
                                            <td><img src="{{ asset( "$slider->image" ) }}" style="width:70px; height:70px" alt="" /></td>
                                            <td>{{ $slider->status }}</td>
                                            <td class="">
                                                <a href="{{ route('slider.edit', $slider->id )}}"><i class="bi bi-pencil-square"></i></a>
                                                <a href="{{ route('slider.delete', $slider->id )}}" onclick="return confirm('Are you sure, you want to delete the porduct.')"><i class="bi bi-trash-fill text-danger"></i></a>
                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7">No Slider Available</td>
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
