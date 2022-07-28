<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];


    //1 kategori di miliki oleh banyak buku
    public function book()
    {
        //estimasi
        //nama nama foreignkey yang ada di table books ada category_id
        return $this->hasMany(Book::class);
    }
}
