<?php

namespace App\Http\Livewire\Frontend\Partials;

use App\Models\Product;
use Livewire\Component;

class Trending extends Component
{
    public function render()
    {
        return view('livewire.frontend.partials.trending',[
            'trendings' => Product::orderby('views','desc')->take(8)->get()
        ]);
    }
}
