<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $fillable = [
    //     'name',
    //     'description',
    //     'price',
    //     'stock',
    //     // هر فیلد دیگری که می‌خواهی با Mass Assignment پر شود
    // ];
    protected $fillable = ['name', 'price', 'stock', 'current_stock', 'description'];
}
