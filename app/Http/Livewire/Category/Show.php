<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    public $sort = 'all', $search;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function loadCateg(){
        $query = Category::orderBy('category')->search($this->search);

        if($this->sort != 'all'){
            $query->where('category', $this->sort);
        }

        $category = $query->paginate(5);
        return compact('category');
    }

    public $category_delete_id;
    public function deleteConfirmation($id)
    {
        // $investor = Investor::where('id', $id)->first();

        $this->category_delete_id = $id;
    }

    public function deleteCategoryData(){
        $category = Category::where('id', $this->category_delete_id)->first();
        $category->delete();

        return redirect('/category')->with('message', 'Deleted Successfully');

        $this->category_delete_id = '';
    }

    public function editConfirmation($id){
        $category = Category::findOrFail($id);
        $this->cat_id        = $id;
        $this->editCategory    = $category->category;
        $this->editRemarks     = $category->remarks;
    }

    public $cat_id;
    public function update()
    {
        $this->validate([
            'editCategory'     => 'required',
            'editRemarks'      => 'required',
        ]);

        $category = Category::find($this->cat_id);
        $category->update([
            'category'  => $this->editCategory,
            'remarks'   => $this->editRemarks,
        ]);

        return redirect('/category')->with('message', 'Updated Successfully');
    }

    public function render()
    {
        return view('livewire.category.show', $this->loadCateg());
    }
}
