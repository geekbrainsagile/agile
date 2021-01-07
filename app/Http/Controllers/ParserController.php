<?php

namespace App\Http\Controllers;

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
                $this->parseLink($resource->link);
        }

    }

    public function parseLink(string $link) : void {

        $html = file_get_contents($link);

        $dom = \phpQuery::newDocument($html);

        foreach($dom->find(".catalog-item-card") as $key => $value) {

            $pq = pq($value);

            foreach ($pq->find(".properties") as $subkey => $subvalue) {

                $subpq = pq($subvalue);

                echo $subpq->find(".name")->text();
                echo $subpq->find(".val")->text();

            }

            echo $pq->find(".catalog-item-price")->text();
        }

        \phpQuery::unloadDocuments();
    }
}