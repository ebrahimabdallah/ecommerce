<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable=[
        'subCategoryName','Category_id','CategoryName','slug'
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class,'Category_id');
    }
  
}
