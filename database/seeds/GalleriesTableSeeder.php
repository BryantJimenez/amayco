<?php

use Illuminate\Database\Seeder;

class GalleriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $galleries = [
    		['id' => 1, 'title' => 'Imagen 1', 'slug' => 'imagen-1', 'image' => 'imagen.jpg', 'description' => 'Imagen de la galeria', 'state' => "1", 'category_id' => 1, 'language_id' => 1],
    		['id' => 2, 'title' => 'Imagen 2', 'slug' => 'imagen-2', 'image' => 'imagen.jpg', 'description' => 'Imagen de la galeria', 'state' => "1", 'category_id' => 1, 'language_id' => 1],
    		['id' => 3, 'title' => 'Imagen 3', 'slug' => 'imagen-3', 'image' => 'imagen.jpg', 'description' => 'Imagen de la galeria', 'state' => "1", 'category_id' => 1, 'language_id' => 1],
    		['id' => 4, 'title' => 'Imagen 4', 'slug' => 'imagen-4', 'image' => 'imagen.jpg', 'description' => 'Imagen de la galeria', 'state' => "1", 'category_id' => 1, 'language_id' => 1],
    		['id' => 5, 'title' => 'Imagen 5', 'slug' => 'imagen-5', 'image' => 'imagen.jpg', 'description' => 'Imagen de la galeria', 'state' => "1", 'category_id' => 1, 'language_id' => 1],
    		['id' => 6, 'title' => 'Imagen 6', 'slug' => 'imagen-6', 'image' => 'imagen.jpg', 'description' => 'Imagen de la galeria', 'state' => "1", 'category_id' => 1, 'language_id' => 1],
            ['id' => 7, 'title' => 'Image 1', 'slug' => 'image-1', 'image' => 'imagen.jpg', 'description' => 'Gallery image', 'state' => "1", 'category_id' => 2, 'language_id' => 2],
            ['id' => 8, 'title' => 'Image 2', 'slug' => 'image-2', 'image' => 'imagen.jpg', 'description' => 'Gallery image', 'state' => "1", 'category_id' => 2, 'language_id' => 2],
            ['id' => 9, 'title' => 'Image 3', 'slug' => 'image-3', 'image' => 'imagen.jpg', 'description' => 'Gallery image', 'state' => "1", 'category_id' => 2, 'language_id' => 2],
            ['id' => 10, 'title' => 'Image 4', 'slug' => 'image-4', 'image' => 'imagen.jpg', 'description' => 'Gallery image', 'state' => "1", 'category_id' => 2, 'language_id' => 2],
            ['id' => 11, 'title' => 'Image 5', 'slug' => 'image-5', 'image' => 'imagen.jpg', 'description' => 'Gallery image', 'state' => "1", 'category_id' => 2, 'language_id' => 2],
            ['id' => 12, 'title' => 'Image 6', 'slug' => 'image-6', 'image' => 'imagen.jpg', 'description' => 'Gallery image', 'state' => "1", 'category_id' => 2, 'language_id' => 2]
    	];
    	DB::table('galleries')->insert($galleries);
    }
}
