<?php

namespace App\Http\Livewire\Frontend\Pages;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class SingleCategory extends Component
{
    use WithPagination;

    public Category $category;

    public function render()
    {
        return view('livewire.frontend.pages.single-category',[
            'products' => $this->category->products
        ])->extends('frontend.layout.app');
    }
}
