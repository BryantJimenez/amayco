<?php

use Illuminate\Database\Seeder;

class AttentionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$attentions = [
    		['id' => 1, 'attention' => '<p>Si tienes alguna duda, o quieres consultarnos algo, ponemos a tu alcance un servicio de atención al cliente rápido y eficiente para que nos preguntes todo lo que te interese saber.</p>', 'schedule' => '<p class="text-dark mb-1"><i class="fa fa-clock-o mr-3"></i> Lun a Vier: de 9:00 a 12:30 y de 16:00 a 19:00hs</p><p class="text-dark mb-1"><i class="fa fa-clock-o mr-3"></i> Sab: de 9:00 a 12:30 y de 16:00 a 19:00hs</p><p class="text-dark mb-1"><i class="fa fa-clock-o mr-3"></i> Dom: 16:00 a 19:00hs</p>', 'slug' => 'atencion', 'language_id' => 1],
    		['id' => 2, 'attention' => '<p>If you have any questions, or want to ask us something, we put at your disposal a fast and efficient customer service so that you can ask us everything you are interested in knowing.</p>', 'schedule' => '<p class="text-dark mb-1"><i class="fa fa-clock-o mr-3"></i> Mon to Fri: from 9:00 a.m. to 12:30 p.m. and from 4:00 p.m. to 7:00 p.m.</p><p class="text-dark mb-1"><i class="fa fa-clock-o mr-3"></i> Sat: from 9:00 a.m. to 12:30 p.m. and from 4:00 p.m. to 7:00 p.m.</p><p class="text-dark mb-1"><i class="fa fa-clock-o mr-3"></i> Sun: 4:00 p.m. to 7:00 p.m.</p>', 'slug' => 'atencion-0', 'language_id' => 2]
    	];
    	DB::table('attentions')->insert($attentions);
    }
}
