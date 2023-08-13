<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Image extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'productID',
        'imageName',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }


}
