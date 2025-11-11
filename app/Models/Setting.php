<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model implements TranslatableContract
{
    use HasFactory, Translatable;
    public $translatedAttributes = ['title', 'content'];

    protected $fillable = [
        'id',
        'logo',
        'favicon',
        'facebook',
        'instgram',
        'email',
        'phone',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public static function checkSettings(){
        $settings = Self::all();
        if(count($settings) < 1){
            $data = [
                'id' => 1
            ];

            foreach(config('app.languages') as $key=>$lang){
                $data[$key]['title'] = $lang;
            }

            Self::create($data);
        }

        return Self::first();
    }
}
