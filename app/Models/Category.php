<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // If the table name is not the plural form of the model name, specify it
    protected $table = 'categories';
    // Specify the primary key if it's not 'id'
    protected $primaryKey = 'category_id';

    // Disable auto-incrementing if the primary key is not an integer
    public $incrementing = true;

    // Set the type of the primary key if it's not an integer
    protected $keyType = 'int';

    // Specify which attributes can be mass-assigned
    protected $fillable = ['name', 'description','del_flg'];
}
