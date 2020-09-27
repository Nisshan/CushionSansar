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
    public $updated_image;

    public array $rules = [
        'name' => 'required| min:3',
        'status' => 'required',
        'updated_image' => 'sometimes'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'name' => 'required|min:3',
            'status' => 'required',
            'updated_image' => 'sometimes'
        ]);
    }

    public function mount($id)
    {
        $category = Category::find($id);
        $this->name = $category->name;
        $this->status = $category->status;
        $this->image = $category->image;
        $this->category_id = $id;

    }

    public function save()
    {
        $category = Category::find($this->category_id);
        $category->name = ucfirst($this->name);
        $category->status = $this->status;
        if ($this->updated_image) {
            $this->uploadImage($category);
        }
        $category->save();
        session()->flash('success', 'Category Updated Success');
        return redirect()->route('categories.index');

    }

    public function uploadImage($category)
    {
        Storage::disk('public')->delete('categories/' . $category->image);
        $image = $this->updated_image->store('public/categories');
        $path = (explode('/', $image));
        return $category->image = $path[2];
    }

    public function render()
    {
        return view('livewire.category.edit')->extends('adminlte::page');
    }
}
