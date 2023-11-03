<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    // TODO: be yourself. Sapeeee
    protected $table = 'product_images';
    protected $fillable = [
        'product_id',
        'image'
    ];
}
