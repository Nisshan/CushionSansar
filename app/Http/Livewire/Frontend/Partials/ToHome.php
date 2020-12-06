<?php

namespace App\Http\Livewire\Frontend\Partials;

use App\Models\Category;
use Livewire\Component;

class ToHome extends Component
{
    public function render()
    {
        return view('livewire.frontend.partials.to-home',[
            'category' => Category::active()->tohome()->latest()->first()
        ]);
    }
}
