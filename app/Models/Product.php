<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

     // If the table name is not the plural form of the model name, specify it
     protected $table = 'products';
     protected $primaryKey = 'product_id';
     // Specify which attributes can be mass-assigned
     protected $fillable = ['product_id','category_id','product','description','price','price_sub','qty_sell','rating','img','alt_img','brand_id','s_title','m_description','s_slug','del_flg'];

     protected $casts = [
         'created_at' => 'date:d/m/Y',
         'updated_at' => 'date:d/m/Y',
     ];
}
