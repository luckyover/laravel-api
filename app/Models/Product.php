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
     protected $fillable = ['product_id','category_id','name','description','price','total_sales','rating','image_url','brands','seo_title','seo_description','seo_slug','del_flg'];

     protected $casts = [
         'created_at' => 'date:d/m/Y',
         'updated_at' => 'date:d/m/Y',
     ];
}
