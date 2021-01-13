<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'text' => 'Бальзамы',
                'slug' => 'balm'
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
