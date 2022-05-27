<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'subcategorie_name_en',
        'subcategorie_name_ar',
        'subcategorie_slug_en',
        'subcategorie_slug_ar',
    ];

    /**
     * create tables relationships
     */
    public function category(){
        return $this->belongsTo(category::class, 'category_id', 'id');
    }
}
