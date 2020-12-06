<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $name;
    public $status;
    public $category_id;
    public $image;
    public $category;
    public $to_home;

    public array $rules = [
        'name' => 'required| min:3',
        'status' => 'required',
        'image' => 'sometimes',
        'to_home' => 'required'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'name' => 'required|min:3',
            'status' => 'required',
            'image' => 'sometimes'
        ]);
    }

    public function mount($id)
    {
        $this->category = Category::find($id);
        $this->name = $this->category->name;
        $this->status = $this->category->status;
        $this->to_home = $this->category->to_home;
        $this->category_id = $id;
    }

    public function save()
    {
        $category = Category::find($this->category_id);
        $category->name = ucfirst($this->name);
        $category->status = $this->status;
        $category->to_home = $this->to_home;
        $category->save();

        if ($this->image) {
            $this->uploadImage($category);
        }
        session()->flash('success', 'Category Updated Success');
        return redirect()->route('categories.index');

    }

    public function uploadImage($category)
    {
        $exists = $category->getFirstMedia('category');
        if ($exists) {
            $exists->delete();
        }
        $image = $this->image->store('public/categories');
        $path = (explode('/', $image));
        $category->addMedia('storage/categories/' . $path[2])->toMediaCollection('category');
    }


    public function render()
    {
        return view('livewire.category.edit')->extends('adminlte::page');
    }
}
