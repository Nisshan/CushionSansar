<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $image;

    public array $rules = [
        'name' => 'required| min:3',
        'image' => 'sometimes'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'name' => 'required|min:3',
        ]);
    }

    public function save()
    {
        $this->validate();

        $image = $this->image->store('public/categories');
        $path = explode('/',$image);
        Category::create([
            'name' => ucfirst($this->name),
            'slug' => Str::slug($this->name),
            'image' => $path[2]
        ]);

        session()->flash('success','Category Created Success');
        return redirect()->route('categories.index');
    }

    public function render()
    {
        return view('livewire.category.create')->extends('adminlte::page');
    }
}
