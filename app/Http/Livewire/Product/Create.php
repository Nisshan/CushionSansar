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
    public $is_trending = false;
    public $is_popular = false;
    public $image;
    public $category = [];
    public $images = [];


    public array $rules = [
        'name' => 'required| min:5',
        'description' => 'required',
        'price' => 'sometimes',
        'is_trending' => 'required',
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
            'is_trending' => 'required | boolean',
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
            'is_trending' => $this->is_trending,
            'is_popular' => $this->is_popular,
        ]);

        $product->categories()->attach($this->category);
        $this->uploadImage($product);
        $this->uploadImages($product);

        session()->flash('success', 'product Inserted Success');
        return redirect()->route('products.index');

    }

    public function uploadImage($product)
    {
        $image = $this->image->store('public/product');
        $path = explode('/', $image);
        $product->addMedia('storage/product/' . $path[2])->toMediaCollection('product');
    }

    public function uploadImages($product)
    {
        foreach ($this->images as $image) {
            $image = $image->store('public/product');
            $path = explode('/', $image);
            $product->addMedia('storage/product/' . $path[2])->toMediaCollection('product-images');
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
