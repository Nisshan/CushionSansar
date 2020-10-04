<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $guarded = [];

    public function product()
    {
        return $this->belongsToMany(Product::class);
    }

    public function scopeToHome($query)
    {
        return $query->where('to_home',1);
    }

    public function scopeActive($query)
    {
        return $query->where('status',1);
    }

}
