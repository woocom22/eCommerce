<div>
    @include('livewire.modal')


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card">
                        <div class="card-header">
                            <h2>Brand list<input type="search" wire:model="search" class="form-control float-end mx-2" style="width: 220px" placeholder="Search...." /><button type="button" class="btn btn-primary float-end"
                                    data-bs-toggle="modal" data-bs-target="#addBrand">
                                    Add Brand
                                </button>
                            </h2>
                        </div>
                        <div>
                            @if (session()->has('message'))
                                <h5 class="alert alert-success m-4">{{session('message')}}</h5>
                            @endif
                        </div>
                        <div class="card-body">
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
                                    @foreach($brands as $brand)
                                        <tr>
                                            <td>{{ $brand->name }}</td>
                                            <td>{{ $brand->slug }}</td>
                                            <td>{{ $brand->status }}</td>
                                            <td class="">
                                                <a type="button" wire:click="editBrand({{ $brand->id }})"  data-bs-toggle="modal" data-bs-target="#editBrandModal"><i
                                                        class="bi bi-pencil-square"></i></a>
                                                <a type="button" wire:click="deleteBrand({{ $brand->id }})" data-bs-toggle="modal" data-bs-target="#deleteBrandModal"><i
                                                        class="bi bi-trash-fill text-danger"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>
                                {{ $brands->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
