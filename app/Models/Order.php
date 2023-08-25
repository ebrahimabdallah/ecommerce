<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

 protected $fillable=[
    'userid','shopping_phoneNumber','shopping_postalCode','shopping_address','product_id','quantity'
 ];

}
