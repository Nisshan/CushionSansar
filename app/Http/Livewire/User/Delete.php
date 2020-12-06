<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Delete extends Component
{
    public User $user;

//
    public function delete()
    {
        if ($this->user->id == 1) {
            session()->flash('danger', 'Cannot Delete this User');
            return redirect()->route('users.index');
        } else {
            $this->user->delete();
            session()->flash('success', 'User Deleted Success');
            return redirect()->route('users.index');
        }

    }

    public function render()
    {
        return <<<'blade'
             <div>
               <a href="{{route('users.edit',$user->id)}}" class="btn btn-sm btn-warning"> Edit</a>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal-{{$user->id}}">
                  Delete
                </button>
                <div class="modal fade" id="exampleModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete {{$user->name}} Account</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                         Deleted Data Cannot be Retrieved. are you sure??
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
