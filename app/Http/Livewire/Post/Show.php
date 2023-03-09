<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    public $sort_post = 'all', $search;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function loadPosts(){
        $query = Post::orderBy('author')->search($this->search)
        ->with('category');

        if($this->sort_post != 'all'){
            $query->where('category_id', $this->sort_post);
        }

        $posts = $query->paginate(4);
        return compact('posts');
    }

    public function loadCat(){
        $category = Category::orderBy('category')->get();
        return compact('category');
    }

    public $post_delete_id;
    public function deleteConfirmation($id)
    {
        $this->post_delete_id = $id;
    }

    public function deletePostData(){
        $post = Post::where('id', $this->post_delete_id)->first();
        $post->delete();

        return redirect('/post')->with('message', 'Deleted Successfully');

        $this->post_delete_id = '';
    }

    public function editConfirmation($id){
        $post = Post::findOrFail($id);
        $this->post_id        = $id;
        $this->editAuthor     = $post->author;
        $this->editCategory_id   = $post->category_id;
        $this->editTitle      = $post->title;
        $this->editContent    = $post->content;
    }

    public $post_id;
    public function update()
    {
        $this->validate([
            'editAuthor'           => 'required',
            'editCategory_id'      => 'required',
            'editTitle'            => 'required',
            'editContent'          => 'required',
        ]);

        $post = Post::find($this->post_id);
        $post->update([
            'author'  => $this->editAuthor,
            'category_id'   => $this->editCategory_id,
            'title'   => $this->editTitle,
            'content'   => $this->editContent,

        ]);

        return redirect('/post')->with('message', 'Updated Successfully');
    }
    public function render()
    {
        return view('livewire.post.show', $this->loadPosts(), $this->loadCat());
    }
}
