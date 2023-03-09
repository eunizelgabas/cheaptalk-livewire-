<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class Addcategory extends Component
{
    public $category, $remarks;

    public function addCategory()
    {
        $this->validate([
            'category'    =>['required','string', 'max:255'],
            'remarks'      =>['required','string', 'max:255']
        ]);

        Category::create([
          'category'    =>$this->category,
          'remarks'      =>$this->remarks,
        ]);

        return redirect('/category')->with('message', 'Added Successfully');

    }
    public function render()
    {
        return view('livewire.category.addcategory');
    }
}
