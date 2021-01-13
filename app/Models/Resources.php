<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = ['link', 'store'];

    public static function rules() {
        return [
            'link' => 'required|url|min:10|max:200',
            'store' => 'required|string|min:3|max:200'
        ];
    }

    public static function attrNames(){
        return [
            'link' => 'Ссылка на каталог товаров',
            'store' => 'Магазин'
        ];
    }
}
