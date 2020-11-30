<?php

use Illuminate\Database\Seeder;

class TransfersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transfers = [
    		['id' => 1, 'title' => 'El Aeropuerto', 'slug' => 'el-aeropuerto', 'description' => 'Se encuentra a 20km de la ciudad. El recorrido toma aproximadamente 30 minutos ida o vuelta. Para este servicio tenemos 2 opciones:', 'language_id' => 1],
            ['id' => 2, 'title' => 'Vehículo privado', 'slug' => 'vehiculo-privado', 'description' => 'Consulta tarifas.', 'language_id' => 1],
            ['id' => 3, 'title' => 'Traslado Regular', 'slug' => 'traslado-regular', 'description' => 'Consulta tarifas.', 'language_id' => 1],
            ['id' => 4, 'title' => 'The airport', 'slug' => 'the-airport', 'description' => 'It is located 20km from the city. The tour takes approximately 30 minutes roundtrip. For this service we have 2 options:', 'language_id' => 2],
            ['id' => 5, 'title' => 'Private vehicle', 'slug' => 'private-vehicle', 'description' => 'Check rates.', 'language_id' => 2],
            ['id' => 6, 'title' => 'Regular Transfer', 'slug' => 'regular-transfer', 'description' => 'Check rates.', 'language_id' => 2]
    	];
    	DB::table('transfers')->insert($transfers);
    }
}
