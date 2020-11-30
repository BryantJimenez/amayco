<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
    		['id' => 1, 'name' => 'Español', 'slug' => 'es', 'code' => 'es'],
            ['id' => 2, 'name' => 'Ingles', 'slug' => 'en', 'code' => 'en']
    	];
    	DB::table('languages')->insert($languages);
    }
}
