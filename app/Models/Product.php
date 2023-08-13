<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'productID',
        'categoryID',
        'manufacturerID',
        'name',
        'price',
        'details',
        'cover',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
