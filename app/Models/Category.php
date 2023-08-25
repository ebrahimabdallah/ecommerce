<?php

namespace App\Models;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=[
        'Category_name','slug',
    ];

    public function SubCategory()
    {
        return $this->hasMany(SubCategory::class,'Category_id');
    }

    public function products()
    {
        return $this->hasMany(Products::class,'product_category_id');
    }
}
