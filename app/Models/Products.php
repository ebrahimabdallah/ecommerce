<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
protected $fillable=[

    'product_name','product_short_des','product_long_des','product_category_name','price',
    'product_subcategory_name','product_subcategory_id','product_category_id','product_img','slug',
];

public function Category()
 {
    return $this->belongsTo(Category::class,'product_category_id');

 }

}
