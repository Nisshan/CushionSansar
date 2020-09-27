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
    public $is_hero;
    public $is_popular;
    public $status;
    public $product_id;
    public $updated_image;
    public $category = [];
    public $product;
    public $images;

    public array $rules = [
        'name' => 'required| min:5',
        'description' => 'required',
        'updated_image' => 'sometimes',
        'price' => 'required',
        'is_hero' => 'required',
        'is_popular' => 'required',
        'status' => 'required',
    ];

    public function mount($id)
    {
        $product = Product::find($id);
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->is_popular = $product->is_popular;
        $this->status = $product->status;
        $this->is_hero = $product->status;
        $this->image = $product->image;
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
        $product->is_hero = $this->is_hero;
        if ($this->updated_image) {
            $this->uploadImage($product);
        }
        $product->save();

        if ($this->category) {
            $product->categories()->sync($this->category);
        }

        if ($this->images) {
            $this->uploadImages($product);
        }

        session()->flash('success', 'Product Updated Success');
        return redirect()->route('products.index');
    }

    public function uploadImage($product)
    {
        Storage::disk('public')->delete('products/' . $product->image);
        $image = $this->updated_image->store('public/products');
        $path = (explode('/', $image));
        return $product->image = $path[2];
    }

    public function uploadImages($product)
    {
        $this->deleteOldImages($product);
        foreach ($this->images as $image) {
            $path = $image->store('public/products');
            $url = explode('/', $path);
            $product->images()->create([
                'url' => $url[2]
            ]);
        }
    }

    public function deleteOldImages($product)
    {
        foreach ($product->images as $image) {
            ProductImages::destroy($image->id);
            Storage::disk('public')->delete('products/' . $image->url);
        }
    }

    public function render()
    {
        return view('livewire.product.edit', [
            'categories' => Category::where('status', 1)->get()
        ])->extends('adminlte::page');
    }
}
