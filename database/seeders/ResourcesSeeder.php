<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $links = [
            'https://kristaller.pro/catalog/balm/filter/clear/apply/index.php?limit=100&PAGEN_1=10',
        ];

        foreach ($links as $link) {
            $resources[] = [
                'link' => $link
            ];
        }

        DB::table('resources')->insert($resources);
    }
}
