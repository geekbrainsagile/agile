<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = ['slug', 'text'];

    public function products() {
        return $this->hasMany(Products::class, 'category_id');
    }

    public static function rules() {
        return [
            'slug' => 'required|min:3|max:15|alpha_dash',
            'text' => 'required|min:3|max:15|alpha_dash'
        ];
    }

    public static function attrNames() {
        return [
            'slug' => 'Заголовок',
            'text' => 'Текст'
        ];
    }
}
