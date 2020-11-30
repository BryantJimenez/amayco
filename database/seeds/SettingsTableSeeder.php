<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
    		['id' => 1, 'about_banner' => 'banner-nosotros.jpg', 'gallery_banner' => 'banner-galeria.jpg', 'activity_banner' => 'banner-actividad.jpg', 'contact_banner' => 'banner-contacto.jpg', 'address' => 'Av. De la Integración, Villa Tunari, Bolivia', 'phone' => '+591 71717097', 'email' => 'info@ranabol.com', 'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3330.475622946709!2d-70.57397088480177!3d-33.41084228078524!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662cedfcffc3cd7%3A0x721c81f6dddbdc8e!2sLa%20Capitan%C3%ADa%2080%2C%20Oficina%20108%2C%20Las%20Condes%2C%20Regi%C3%B3n%20Metropolitana%2C%20Chile!5e0!3m2!1ses-419!2sve!4v1596904881686!5m2!1ses-419!2sve" class="w-100" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>']
    	];
    	DB::table('settings')->insert($settings);
    }
}
