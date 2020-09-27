<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $perPage = 10;
    public $sortField = 'created_at';
    public $sortAsc = false;
    public $search = '';

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }


    public function render()
    {
        return view('livewire.user.index',[
          'users' => User::search($this->search)
              ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
              ->paginate($this->perPage)
        ])->extends('adminlte::page');
    }
}
