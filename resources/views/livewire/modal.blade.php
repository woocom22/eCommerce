<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addBrand" tabindex="-1" aria-labelledby="addBrandLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addBrandLabel">Add Brand</h1>
                <button type="button" wire:click="clodeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="storeBrand">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Brand Name:</label>
                        <input type="text" wire:model='name' class="form-control" id="recipient-name">
                        @error('name') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Slug:</label>
                        <input type="text" wire:model='slug' class="form-control" id="recipient-name">
                        @error('slug') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                            <select class="form-control" wire:model="status" id="inputEmail4" aria-label="Default select example">
                                <option selected>Choose Status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="clodeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Brand</button>
                </div>
            </form>
        </div>
    </div>
</div>




<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="editBrandModal" tabindex="-1" aria-labelledby="editBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editBrandModalLabel">Edit Brand</h1>
                <button type="button" wire:click="clodeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateBrand">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Brand Name:</label>
                        <input type="text" wire:model='name' class="form-control" id="recipient-name">
                        @error('name') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Slug:</label>
                        <input type="text" wire:model='slug' class="form-control" id="recipient-name">
                        @error('slug') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                            <select class="form-control" wire:model="status" id="inputEmail4" aria-label="Default select example">
                                <option selected>Choose Status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="clodeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Brand</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- Delete Modal  --}}

<div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="deleteBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteBrandModalLabel">Delete Brand</h1>
                <button type="button" wire:click="clodeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyBrand">
                <div class="modal-body">
                    <h4>Are you sure to delete this brand?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="clodeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

