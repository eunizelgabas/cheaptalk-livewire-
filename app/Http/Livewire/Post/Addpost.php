<?php

namespace App\Http\Livewire\Post;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

class Addpost extends Component
{
    public $author, $category_id, $title, $content;

    public function addPost()
    {
        $this->validate([
            'author'           =>['required','string', 'max:255'],
            'category_id'      =>['required','int'],
            'title'            =>['required','string'],
            'content'          =>['required','string'],
        ]);

        Post::create([
          'author'          =>$this->author,
          'category_id'     =>$this->category_id,
          'title'           =>$this->title,
          'content'         =>$this->content,
        ]);

        return redirect('/post')->with('message', 'Added Successfully');

    }

    public function loadPosts(){
        $category = Category::orderBy('category')->get();
        return compact('category');
    }


    public function render()
    {
        return view('livewire.post.addpost', $this->loadPosts());
    }
}
