<?php

use Illuminate\Database\Seeder;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banners = [
    		['id' => 1, 'title' => 'Primer Banner', 'slug' => 'primer-banner', 'archive' => 'primer-banner.jpg', 'type' => '1', 'state' => '1', 'language_id' => 1],
            ['id' => 2, 'title' => 'Segundo Banner', 'slug' => 'segundo-banner', 'archive' => 'segundo-banner.jpg', 'type' => '1', 'state' => '1', 'language_id' => 1],
            ['id' => 3, 'title' => 'Tercer Banner', 'slug' => 'tercer-banner', 'archive' => 'tercer-banner.jpg', 'type' => '1', 'state' => '1', 'language_id' => 1],
            ['id' => 4, 'title' => 'Cuarto Banner', 'slug' => 'cuarto-banner', 'archive' => 'cuarto-banner.jpg', 'type' => '1', 'state' => '1', 'language_id' => 1],
            ['id' => 5, 'title' => 'Quinto Banner', 'slug' => 'quinto-banner', 'archive' => 'quinto-banner.mp4', 'type' => '2', 'state' => '1', 'language_id' => 1],
            ['id' => 6, 'title' => 'First Banner', 'slug' => 'first-banner', 'archive' => 'first-banner.jpg', 'type' => '1', 'state' => '1', 'language_id' => 2],
            ['id' => 7, 'title' => 'Second Banner', 'slug' => 'second-banner', 'archive' => 'second-banner.jpg', 'type' => '1', 'state' => '1', 'language_id' => 2],
            ['id' => 8, 'title' => 'Third Banner', 'slug' => 'third-banner', 'archive' => 'third-banner.jpg', 'type' => '1', 'state' => '1', 'language_id' => 2],
            ['id' => 9, 'title' => 'Fourth Banner', 'slug' => 'fourth-banner', 'archive' => 'fourth-banner.jpg', 'type' => '1', 'state' => '1', 'language_id' => 2],
            ['id' => 10, 'title' => 'Fifth Banner', 'slug' => 'fifth-banner', 'archive' => 'fifth-banner.mp4', 'type' => '2', 'state' => '1', 'language_id' => 2]
    	];
    	DB::table('banners')->insert($banners);
    }
}
