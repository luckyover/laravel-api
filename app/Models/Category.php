<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // If the table name is not the plural form of the model name, specify it
    protected $table = 'categories';

    // Specify which attributes can be mass-assigned
    protected $fillable = ['id','name','slug','seo_title','meta_description','del_flg'];

    protected $casts = [
        'created_at' => 'date:d/m/Y',
        'updated_at' => 'date:d/m/Y',
    ];
}
