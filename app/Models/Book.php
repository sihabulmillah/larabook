<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded = [];

    // 1 buku hanya memiliki 1 kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public function penulis()
    // {
    // }
}
