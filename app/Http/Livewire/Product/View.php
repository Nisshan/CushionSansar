<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class View extends Component
{
    public $product_id;

    public function mount($id)
    {
        $this->product_id = $id;
    }

    public function render()
    {
        return view('livewire.product.view',[
            'product' => Product::with('categories','images')->find($this->product_id)
        ])->extends('adminlte::page');
    }
}
