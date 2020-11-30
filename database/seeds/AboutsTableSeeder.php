<?php

use Illuminate\Database\Seeder;

class AboutsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$abouts = [
    		['id' => 1, 'about' => '<p>Una empresa joven que opera desde la ciudad de El Calafate; especializada en turismo aventura y tradicional.</p><p>Podemos describir el servicio que brindamos como personalizado, amigable y de alta calidad.</p><p>Para ello ofrecemos gran variedad de excursiones, actividades y expediciones, que nos ayudaran a descubrir las bellezas naturales de esta tierra, su cultura y su historia.</p><p>Nuestro principal objetivo es crear una atmósfera confortable, entretenida y divertida, alentando a nuestros pasajeros a descubrir los encantos naturales de la Patagonia Austral.</p><p>Nos esforzamos para que el pasajero regrese a su casa con una apreciación más profunda y el entendimiento de este lugar mágico en el mundo.</p>', 'slug' => 'nosotros', 'language_id' => 1],
    		['id' => 2, 'about' => '<p>A young company that operates from the city of El Calafate; specialized in adventure and traditional tourism.</p><p>We can describe the service we provide as personalized, friendly, and high-quality.</p><p>For this we offer a great variety of excursions, activities and expeditions, which will help us discover the natural beauties of this land, its culture and its history.</p><p>Our main objective is to create a comfortable, entertaining and fun atmosphere, encouraging our passengers to discover the natural charms of Southern Patagonia.</p><p>We strive for the passenger to return home with a deeper appreciation and understanding of this magical place in the world.</p>', 'slug' => 'nosotros-0', 'language_id' => 2]
    	];
    	DB::table('abouts')->insert($abouts);
    }
}
