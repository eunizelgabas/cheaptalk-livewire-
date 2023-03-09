<div class="container">
        <h1 class="text-dark">Category Details</h1>
        <hr>
        <table class="table table-hover table-striped" style="opacity: 85%; background-color:#FFB562" >
            <div class="row mb-2 ">
                <div class="col" >
                    <select class="form-select " wire:model.lazy='sort'>
                        <option value="all">All category</option>
                        @foreach ($category as $cat)
                        <option value="{{$cat->id}}">{{$cat->category}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Search" wire:model='search'>
                </div>

            </div>
          <thead>
            <tr>
              <th class="text-center">Category</th>
              <th class="text-center">Remarks</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          @foreach($category as $category)
          <tbody >
                <td class="text-dark text-center" >{{$category->category}}</td>
                <td class="text-dark text-center" >{{$category->remarks}}</td>
                <td class="text-center">
                    <button type="button" class="btn btn-info btn-sm m-2 " data-bs-toggle="modal" data-bs-target="#updateModal" wire:click='editConfirmation({{$category->id}})'>
                        <i class="fa-solid fa-pen"></i>
                    </button>
                    <!-- Update Investor Modal -->
                    <div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true" data-backdrop="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #FFB562">
                                    <h1 class="modal-title fs-5" id="updateModalLabel">Edit Category</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control  @error('category') is-invalid @enderror" id="category" wire:model.defer='editCategory'>
                                        <label for="category" class="col-form-label">Category:</label>
                                        @error('category')
                                       <p class="invalid-feedback">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control  @error('remarks') is-invalid @enderror" id="remarks" wire:model.defer='editRemarks'>
                                        <label for="remarks" class="col-form-label">Remarks:</label>
                                        @error('remarks')
                                       <p class="invalid-feedback">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-warning" wire:click.prevent ="update()" >Update Category</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm m-2 " data-bs-toggle="modal" data-bs-target="#deleteModal" wire:click='deleteConfirmation({{$category->id}})'>
                        <i class="fa-solid fa-trash"></i>
                    </button>
                    <!-- Delete Investor Modal -->
                    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true" data-backdrop="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <h1 class="modal-title fs-5" id="deleteModalLabel">Delete Category</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h4>Are you sure you want to delete this category?</h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-danger" wire:click ="deleteCategoryData()" >Delete Category</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tbody>

          @endforeach

        </table>


</div>
<style>
    .modal-backdrop {
        display: none;
    }
</style>
