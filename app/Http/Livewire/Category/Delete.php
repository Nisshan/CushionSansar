<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class Delete extends Component
{
    public Category $category;

    public function delete()
    {
        $this->category->delete();
        session()->flash('success', 'Category Deleted Success');
        return redirect()->route('categories.index');
    }

    public function render()
    {
        return <<<'blade'
            <div>
               <a href="{{route('categories.edit',$category->id)}}" class="btn btn-sm btn-warning"> Edit</a>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal-{{$category->id}}">
                  Delete
                </button>
                <div class="modal fade" id="exampleModal-{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete {{$category->name}} Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        All Products related to {{$category->name}} will be deleted. Are you sure??
                    </div>
                      <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                          <button wire:click="delete" class="btn btn-danger">Confirm</button>
                     </div>
                    </div>
                    </div>
                </div>
             </div>
        blade;
    }
}
