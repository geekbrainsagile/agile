<?php


namespace App\Services;


class ParserService
{
    public function parseCatalog($link)
    {
        $html = file_get_contents('https://kristaller.pro/catalog/balm/filter/clear/apply/index.php?limit=100&PAGEN_1=10');

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
