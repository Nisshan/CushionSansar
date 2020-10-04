<?php

namespace App\Http\Livewire\Frontend\Partials;

use App\Models\Product;
use Livewire\Component;

class ProductList extends Component
{
    public function render()
    {
        return view('livewire.frontend.partials.product-list',[
            'products' => Product::with('categories')->latest()->take(5)->get()
        ]);
    }
}
