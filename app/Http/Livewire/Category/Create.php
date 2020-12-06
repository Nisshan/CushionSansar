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
    public $to_home = 0;

    public array $rules = [
        'name' => 'required| min:3',
        'image' => 'sometimes',
        'to_home' => 'required'
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
        $path = explode('/', $image);
        $category = Category::create([
            'name' => ucfirst($this->name),
            'slug' => Str::slug($this->name),
            'to_home' => $this->to_home
        ]);
        $category->addMedia('storage/categories/' . $path[2])->toMediaCollection('category');
        session()->flash('success', 'Category Created Success');
        return redirect()->route('categories.index');
    }

    public function render()
    {
        return view('livewire.category.create')->extends('adminlte::page');
    }
}
