<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Delete extends Component
{
    public Product $product;

    public function delete()
    {
        $this->product->delete();
        session()->flash('success', 'Product Deleted Success');
        return redirect()->route('products.index');
    }

    public function render()
    {
        return <<<'blade'
            <div>
               <a href="{{route('products.edit',$product->id)}}" class="btn btn-sm btn-warning"> Edit</a>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal-{{$product->id}}">
                  Delete
                </button>
                <div class="modal fade" id="exampleModal-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete {{$product->name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Delete {{$product->name}}?? This cannot be reverted. Are you sure??
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
