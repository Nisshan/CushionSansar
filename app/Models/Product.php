<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImages::class);
    }

    public function imagePath()
    {
        return 'storage/products/'. $this->image;
    }

    public function scopeIsHero($query)
    {
        return $query->where('is_hero',1);
    }

    public function scopeStatus($query)
    {
        return $query->where('status',1);
    }


}
