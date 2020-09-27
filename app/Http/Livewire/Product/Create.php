<?php

namespace App\Http\Livewire\Product;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{

    use WithFileUploads;

    public $name;
    public $description;
    public $price;
    public $is_hero = false;
    public $is_popular = false;
    public $image;
    public $category = [];
    public $images = [];


    public array $rules = [
        'name' => 'required| min:5',
        'description' => 'required',
        'price' => 'sometimes',
        'is_hero' => 'required',
        'is_popular' => 'required',
        'image' => 'required',
        'images' => 'sometimes'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'name' => 'required| min:5',
            'description' => 'required',
            'price' => 'sometimes',
            'is_hero' => 'required | boolean',
            'is_popular' => 'required | boolean',
            'image' => 'required',
            'category.*' => 'required| exists:category,id'
        ]);
    }

    public function save()
    {

        $this->validate();


        $product = Product::create([
            'name' => $this->name,
            'slug' => $this->slug($this->name),
            'description' => $this->description,
            'price' => $this->price,
            'is_hero' => $this->is_hero,
            'is_popular' => $this->is_popular,
            'image' => $this->uploadImage()
        ]);

        $product->categories()->attach($this->category);
        $this->uploadImages($product);

        session()->flash('success', 'product Inserted Successs');
        return redirect()->route('products.index');

    }

    public function uploadImage()
    {
        $image = $this->image->store('public/products');
        $path = explode('/', $image);
        return $path[2];
    }

    public function uploadImages($product)
    {
        foreach ($this->images as $image) {
            $image = $image->store('public/products');
            $path = explode('/', $image);
            $product->images()->create([
                'url' => $path[2]
            ]);
        }
    }

    public function slug($slug)
    {
        $slug = Str::slug($slug);

        $count = Product::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();

        return $count ? "{$slug}-{$count}" : $slug;
    }

    public function render()
    {
        return view('livewire.product.create', [
            'categories' => Category::where('status', 1)->get()
        ])->extends('adminlte::page');
    }
}
