<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

     // If the table name is not the plural form of the model name, specify it
     protected $table = 'media';
     protected $primaryKey = 'media_id';
     // Specify which attributes can be mass-assigned
     protected $fillable = [
        'media_id',
        'product_id',
        'media_type',
        'media_url',
        'alt_text',
        'disp_order',
        'del_flg'
     ];
     protected $casts = [
         'created_at' => 'date:d/m/Y',
         'updated_at' => 'date:d/m/Y',
     ];
}
