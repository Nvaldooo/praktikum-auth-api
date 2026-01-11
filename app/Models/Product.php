<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Properti ini harus berada di dalam class
    protected $fillable = [
        'name',
        'price',
        'stock',
        'sku'
    ];
}