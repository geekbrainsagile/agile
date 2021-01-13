<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Resources;
use Illuminate\Http\Request;

class ParserController extends Controller
{

    /**
     * ParserController constructor.
     */
    public function __construct()
    {

    }

    public function index() {

        $products = [];

        foreach (Resources::all() as $resource) {

            $products = $this->parseLink($resource->link);

                if (!empty($products)) {
                    foreach ($products as $product) {
                        Products::query()->firstOrCreate([
                            'code' => $product['code'],
                            'article' => $product['article'],
                            'description' => $product['description'],
                            'brand' => $product['brand'],
                            'country' => $product['country'],
                            'price' => floatval( $product['price'] ),
                            'category_id' => $resource->category_id
                        ]);

                    }
                }
        }

        return redirect()->route('home')->with('success', 'Товары были добавлены.');
    }

    public function parseLink(string $link) : array {

        $html = file_get_contents($link);

        $dom = \phpQuery::newDocument($html);

        $products = [];

        foreach($dom->find(".catalog-item-card") as $key => $value) {

            $props = [];

            $pq = pq($value);

            $props['description'] = $pq->find('.item-all-title span')->text() ?? 'Наименование';

            $price = $pq->find(".catalog-item-price")->text();

            if (!empty($price)) {
                $price = explode(" ", trim($price))[0];
            }

            $props['price'] = $price ?? 0;
            $props['code'] = '';
            $props['article'] = '';
            $props['country'] = '';
            $props['brand'] = '';


            foreach ($pq->find(".property") as $subvalue) {

                $subpq = pq($subvalue);

                $name =  trim($subpq->find('.name')->text()) ?? '';
                $value = trim($subpq->find('.val')->text()) ?? '';


                switch ($name) {
                    case 'Код товара':
                        $props['code'] = $value;
                        break;
                    case 'Артикул модели':
                        $props['article'] = $value;
                        break;
                    case 'Бренд':
                        $props['brand'] = $value;
                        break;
                    case 'Производство':
                        $props['country'] = $value;
                        break;
                }

            }

            $products[] = $props;
//                [
//                'code' => $props['code'],
//                'article' => $props['article'],
//                'description' => $props['description'],
//                'brand' => $props['brand'],
//                'country' => $props['country'],
//                'price' => $props['price'],
//            ];


        }

        \phpQuery::unloadDocuments();

        return $products;

    }
}
