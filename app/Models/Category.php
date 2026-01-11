<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Properti fillable agar kolom bisa diisi secara massal
    protected $fillable = [
        'name', 
        'slug'
    ];
}