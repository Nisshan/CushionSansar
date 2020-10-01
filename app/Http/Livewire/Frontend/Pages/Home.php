<?php

namespace App\Http\Livewire\Frontend\Pages;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.frontend.pages.home')->extends('frontend.layout.app');
    }
}
