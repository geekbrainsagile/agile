<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;


    public $timestamps = true;
    protected $fillable = ['code', 'article', 'description', 'brand', 'country', 'price', 'category_id'];

    public function category() {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public static function rules() {

        return [
            'code' => 'required|string|min:5|max:50|unique:products,code',
            'article' => 'required|string|min:5|max:50',
            'description' => 'required|string|min:5|max:1024',
            'brand' => 'nullable|string|min:5|max:1024',
            'country' => 'nullable|string|min:5|max:100',
            'price' => 'required|numeric',
            'category_id' => "required|exists:categories,id"
        ];
    }

    public static function attrNames(){
        return [
            'code' => 'Код товара',
            'article' => 'Артикул',
            'description' => 'Наименование',
            'brand' => 'Бренд',
            'country' => 'Страна производства',
            'price' => 'Цена',
            'category_id' => 'Категория товара'
        ];
    }

}

