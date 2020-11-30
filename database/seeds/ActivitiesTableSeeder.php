<?php

use Illuminate\Database\Seeder;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $activities = [
    		['id' => 1, 'name' => 'Excursiones', 'slug' => 'excursiones', 'state' => '1', 'language_id' => 1],
            ['id' => 2, 'name' => 'Cuatriciclos Quad Escape', 'slug' => 'cuatriciclos-quad-escape', 'state' => '1', 'language_id' => 1],
            ['id' => 3, 'name' => 'Minitrekking', 'slug' => 'minitrekking', 'state' => '1', 'language_id' => 1],
            ['id' => 4, 'name' => 'Travesía 4X4', 'slug' => 'travesia-4x4', 'state' => '1', 'language_id' => 1],
            ['id' => 5, 'name' => 'Kayak Experience', 'slug' => 'kayak-experience', 'state' => '1', 'language_id' => 1],
            ['id' => 6, 'name' => 'Cabalgatas', 'slug' => 'cabalgatas', 'state' => '1', 'language_id' => 1],
            ['id' => 7, 'name' => 'Safari Experience', 'slug' => 'safari-experience', 'state' => '1', 'language_id' => 1],
            ['id' => 8, 'name' => 'City Tour', 'slug' => 'city-tour', 'state' => '1', 'language_id' => 1],
            ['id' => 9, 'name' => 'Excursions', 'slug' => 'excursions', 'state' => '1', 'language_id' => 2],
            ['id' => 10, 'name' => 'Quad Escape', 'slug' => 'quad-escape', 'state' => '1', 'language_id' => 2],
            ['id' => 11, 'name' => 'Minitrekking', 'slug' => 'minitrekking-0', 'state' => '1', 'language_id' => 2],
            ['id' => 12, 'name' => '4X4 Crossing', 'slug' => '4x4-crossing', 'state' => '1', 'language_id' => 2],
            ['id' => 13, 'name' => 'Kayak Experience', 'slug' => 'kayak-experience-0', 'state' => '1', 'language_id' => 2],
            ['id' => 14, 'name' => 'Horseback Riding', 'slug' => 'horseback-riding', 'state' => '1', 'language_id' => 2],
            ['id' => 15, 'name' => 'Safari Experience', 'slug' => 'safari-experience-0', 'state' => '1', 'language_id' => 2],
            ['id' => 16, 'name' => 'City Tour', 'slug' => 'city-tour-0', 'state' => '1', 'language_id' => 2]
    	];
    	DB::table('activities')->insert($activities);
    }
}
