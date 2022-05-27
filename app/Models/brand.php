<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    use HasFactory;
    /**
     *  insert these columns values
     */
    protected $fillable = [
        'brand_name_en',
        'brand_name_ar',
        'brand_slug_en',
        'brand_slug_ar',
        'brand_image'
    ];
}
