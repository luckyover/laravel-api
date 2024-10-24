<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // If the table name is not the plural form of the model name, specify it
    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    // Specify which attributes can be mass-assigned
    protected $fillable = ['category_id','category_nm','s_slug','s_title','m_description','del_flg'];

    protected $casts = [
        'created_at' => 'date:d/m/Y H:i',
        'updated_at' => 'date:d/m/Y H:i',
    ];
}
