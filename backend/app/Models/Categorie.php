<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    // protected static function newFactory()
    // {
    //     return \Database\Factories\CategoryFactory::new();
    // }
}
