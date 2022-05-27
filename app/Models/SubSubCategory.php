<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'sub_subcategorie_name_en',
        'sub_subcategorie_name_ar',
        'sub_subcategorie_slug_en',
        'sub_subcategorie_slug_ar'
    ];

    /**
     * category one to one relation ship
     */
    public function category(){
        return $this->belongsTo(category::class, 'category_id', 'id');
    }

    /**
     * subcategory one to one relation ship
     */
    public function subcategory(){
        return $this->belongsTo(subcategory::class, 'subcategory_id', 'id');
    }
}
