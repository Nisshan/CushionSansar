<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class Index extends Component
{
    public  $perPage = 10;
    public  $sortField = 'created_at';
    public  $sortAsc = false;
    public  $search = '';

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
        return view('livewire.category.index',[
            'categories' => Category::where('name','like','%'.$this->search.'%')
              ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
              ->paginate($this->perPage)
        ])->extends('adminlte::page');
    }
}
