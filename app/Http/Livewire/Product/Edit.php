<?php

namespace App\Http\Livewire\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $name;
    public $description;
    public $image;
    public $price;
    public $is_trending;
    public $is_popular;
    public $status;
    public $product_id;
    public $category = [];
    public $product;
    public $images;

    public array $rules = [
        'name' => 'required| min:5',
        'description' => 'required',
        'image' => 'sometimes',
        'price' => 'required',
        'is_trending' => 'required',
        'is_popular' => 'required',
        'status' => 'required',
        'images' => 'sometimes'
    ];

    public function mount($id)
    {
        $product = Product::find($id);
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->is_popular = $product->is_popular;
        $this->status = $product->status;
        $this->is_trending = $product->is_trending;
        $this->product_id = $id;
        $this->product = $product;
    }

    public function save()
    {

        $product = Product::find($this->product_id);
        $product->name = $this->name;
        $product->description = $this->description;
        $product->price = $this->price;
        $product->status = $this->status;
        $product->is_popular = $this->is_popular;
        $product->is_trending = $this->is_trending;
        $product->save();

        if ($this->category) {
            $this->product->categories()->sync($this->category);
        }

        if ($this->image) {
            $this->uploadImage($this->product);
        }

        if ($this->images) {
            $this->uploadMultipleImage($this->product);
        }

        session()->flash('success', 'Product Updated Success');
        return redirect()->route('products.index');
    }

    public function uploadImage($product)
    {
        $oldimage = $product->getFirstMedia('product');
        if ($oldimage) {
            $oldimage->delete();
        }
        $image = $this->image->store('public/product');
        $path = explode('/', $image);
        $product->addMedia('storage/product/' . $path[2])->toMediaCollection('product');
    }

    public function uploadMultipleImage($product)
    {
        foreach ($product->getMedia('product-images') as $media) {
            $media->delete();
        }
        foreach ($this->images as $image) {

            $image = $image->store('public/product');
            $path = explode('/', $image);
            $product->addMedia('storage/product/' . $path[2])->toMediaCollection('product-images');
        }
    }

    public function render()
    {
        return view('livewire.product.edit', [
            'categories' => Category::where('status', 1)->get()
        ])->extends('adminlte::page');
    }
}
