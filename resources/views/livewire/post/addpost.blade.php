<div class="col-md-5 mx-auto">
    <div class="card p-5">
        <h1 class="align-items-center">Create Post</h1>
        <div class="card-body">
                <form>
                    <div class="form-floating mb-3">
                        <input class="form-control @error('author') is-invalid @enderror" wire:model.defer='author'>
                        <label for="author" class="col-form-label">Author:</label>
                        @error('author')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <select name="category" id="category" class="form-select @error('category') is-invalid @enderror" wire:model.defer="category_id">
                        <option hidden="true">Select Category</option>
                        <option selected disabled>Select Category</option>
                        @foreach ($category as $category )
                            <option value="{{$category->id}}">{{$category->category}}</option>
                        @endforeach
                        </select>
                        <label for="category">Category</label>
                        @error('category_id')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control @error('title') is-invalid @enderror" wire:model.defer='title'>
                        <label for="title" class="col-form-label">Title:</label>
                        @error('title')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control @error('content') is-invalid @enderror" wire:model.defer='content' style="height:100px"></textarea>
                        <label for="content" class="col-form-label">Content:</label>
                        @error('content')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                </form>
                <button type="submit" wire:click='addPost' class="btn btn-dark">PUBLISH</button>
        </div>
      </div>
</div>



