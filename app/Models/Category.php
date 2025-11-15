<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['title', 'content'];
    protected $fillable = [
        'id',
        'image',
        'parent_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    public function parent(){
        return $this->belongsTo(Category::class, 'parent');
    }
    public function children(){
        return $this->hasMany(Category::class, 'parent');
    }
}
