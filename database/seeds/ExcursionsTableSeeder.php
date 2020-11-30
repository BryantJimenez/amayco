<?php

use Illuminate\Database\Seeder;

class ExcursionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $excursions = [
    		['id' => 1, 'title' => 'Excursión 1', 'slug' => 'excursion-1', 'image' => 'imagen.jpg', 'description' => '<p>Descripción de la excursión</p>', 'state' => "1", 'language_id' => 1],
    		['id' => 2, 'title' => 'Excursión 2', 'slug' => 'excursion-2', 'image' => 'imagen.jpg', 'description' => '<p>Descripción de la excursión</p>', 'state' => "1", 'language_id' => 1],
    		['id' => 3, 'title' => 'Excursión 3', 'slug' => 'excursion-3', 'image' => 'imagen.jpg', 'description' => '<p>Descripción de la excursión</p>', 'state' => "1", 'language_id' => 1],
    		['id' => 4, 'title' => 'Excursión 4', 'slug' => 'excursion-4', 'image' => 'imagen.jpg', 'description' => '<p>Descripción de la excursión</p>', 'state' => "1", 'language_id' => 1],
    		['id' => 5, 'title' => 'Excursión 5', 'slug' => 'excursion-5', 'image' => 'imagen.jpg', 'description' => '<p>Descripción de la excursión</p>', 'state' => "1", 'language_id' => 1],
    		['id' => 6, 'title' => 'Excursión 6', 'slug' => 'excursion-6', 'image' => 'imagen.jpg', 'description' => '<p>Descripción de la excursión</p>', 'state' => "1", 'language_id' => 1],
            ['id' => 7, 'title' => 'Excursion 1', 'slug' => 'excursion-7', 'image' => 'imagen.jpg', 'description' => '<p>Excursion description</p>', 'state' => "1", 'language_id' => 2],
            ['id' => 8, 'title' => 'Excursion 2', 'slug' => 'excursion-8', 'image' => 'imagen.jpg', 'description' => '<p>Excursion description</p>', 'state' => "1", 'language_id' => 2],
            ['id' => 9, 'title' => 'Excursion 3', 'slug' => 'excursion-9', 'image' => 'imagen.jpg', 'description' => '<p>Excursion description</p>', 'state' => "1", 'language_id' => 2],
            ['id' => 10, 'title' => 'Excursion 4', 'slug' => 'excursion-10', 'image' => 'imagen.jpg', 'description' => '<p>Excursion description</p>', 'state' => "1", 'language_id' => 2],
            ['id' => 11, 'title' => 'Excursion 5', 'slug' => 'excursion-11', 'image' => 'imagen.jpg', 'description' => '<p>Excursion description</p>', 'state' => "1", 'language_id' => 2],
            ['id' => 12, 'title' => 'Excursion 6', 'slug' => 'excursion-12', 'image' => 'imagen.jpg', 'description' => '<p>Excursion description</p>', 'state' => "1", 'language_id' => 2]
    	];
    	DB::table('excursions')->insert($excursions);
    }
}
