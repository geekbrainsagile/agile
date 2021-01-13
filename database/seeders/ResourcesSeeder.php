<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Resources;
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
        $category = Categories::firstWhere('slug', 'balm');

        $resources = [
            [
                'link' => "https://kristaller.pro/catalog/balm/filter/clear/apply/index.php?limit=100&PAGEN_1=10",
                'store' => 'Кристаллер',
                'category_id' => $category->id
             ]
        ];

        DB::table('resources')->insert($resources);
    }
}
