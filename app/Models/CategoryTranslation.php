<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = ['title', 'content'];

    protected $table = 'category_translations';  
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
