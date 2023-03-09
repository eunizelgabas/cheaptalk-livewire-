<div class="col-md-5 mx-auto mt-5">
    <div class="card p-5">
        <h1 class="align-items-center">Create New Category</h1>
        <div class="card-body">
                <form>
                    <div class="form-floating mb-3">
                        <input class="form-control @error('category') is-invalid @enderror" wire:model.defer='category'rows="4">
                        <label for="category" class="col-form-label">Category:</label>
                        @error('category')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control @error('remarks') is-invalid @enderror" wire:model.defer='remarks'>
                        <label for="remarks" class="col-form-label">Remarks:</label>
                        @error('remarks')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                </form>
                <button type="submit" class="btn" wire:click="addCategory" style="background-color:#FFB562">New Category</button>
        </div>
      </div>
</div>
