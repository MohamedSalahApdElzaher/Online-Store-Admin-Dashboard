<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable = [
        'categorie_name_en',
        'categorie_name_ar',
        'categorie_slug_en',
        'categorie_slug_ar',
        'categorie_icon'
    ];
}
