<div class="row">
    <div class="row mb-2 ">
        <div class="col" >
            <select class="form-select " wire:model.lazy='sort_post'>
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
    @foreach ($posts as $post )
    <div class="col-sm-6 mt-5">

        <div class="card border-secondary mb-3">
            <div class="card-header" style="background-color:#FFB562">
                <span style="font-size:20px">Category: </span> {{$post->category->category}}
            </div>
            <div class="card-body">
                <p class="card-text">Author:{{$post->author}} </p>
                <p class="card-text">Title:{{$post->title}} </p>
                <p class="card-text">Content: {{$post->content}}</p>
                <p class="card-text">Time: {{$post->created_at->format('g:i A')}} </p>

                <hr>
                <button type="button" class="btn btn-info btn-sm m-2 " data-bs-toggle="modal" data-bs-target="#updateModal" wire:click='editConfirmation({{$post->id}})'>
                    <i class="fa-solid fa-pen"></i>
                </button>
                <!-- Update Investor Modal -->
                <div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true" data-backdrop="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #FFB562">
                                <h1 class="modal-title fs-5" id="updateModalLabel">Edit Post</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control  @error('author') is-invalid @enderror" id="author" wire:model.defer='editAuthor'>
                                    <label for="author" class="col-form-label">Author:</label>
                                    @error('author')
                                   <p class="invalid-feedback">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <select name="category" id="category" class="form-select @error('category') is-invalid @enderror" wire:model.defer="editCategory_id">
                                    <option value="" hidden="true">Select Category</option>
                                    <option value=" " selected disabled>Select Category</option>
                                    @foreach($category as $cate)
                                        <option value="{{$cate->id}}">{{$cate->category}}</option>
                                    @endforeach
                                    </select>
                                    <label for="category">Category</label>
                                    @error('category_id')
                                    <p class="invalid-feedback">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title" wire:model.defer='editTitle'>
                                    <label for="title" class="col-form-label">Title:</label>
                                    @error('title')
                                   <p class="invalid-feedback">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control  @error('content') is-invalid @enderror" id="content" wire:model.defer='editContent'>
                                    <label for="content" class="col-form-label">content:</label>
                                    @error('content')
                                   <p class="invalid-feedback">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-warning" wire:click.prevent ="update()" >Update Post</button>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-danger btn-sm m-2 " data-bs-toggle="modal" data-bs-target="#deleteModal" wire:click='deleteConfirmation({{$post->id}})'>
                    <i class="fa-solid fa-trash"></i>
                </button>
                <!-- Delete Investor Modal -->
                <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true" data-backdrop="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-danger">
                                <h1 class="modal-title fs-5" id="deleteModalLabel">Delete Post</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h4>Are you sure you want to delete this post?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" wire:click ="deletePostData()" >Delete Post</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endforeach
    <div class="col">
        {{$posts->links()}}
    </div>
</div>
