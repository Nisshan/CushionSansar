<?php

namespace App\Http\Livewire\Frontend\Pages;

use App\Models\Category;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.frontend.pages.home',[
            'categories' => Category::all()
        ])->extends('frontend.layout.app');
    }
}
