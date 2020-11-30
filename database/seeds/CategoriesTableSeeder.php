<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
    		['id' => 1, 'name' => 'Excursiones', 'slug' => 'excursiones', 'language_id' => 1],
            ['id' => 2, 'name' => 'Excursions', 'slug' => 'excursions', 'language_id' => 2]
    	];
    	DB::table('categories')->insert($categories);
    }
}
