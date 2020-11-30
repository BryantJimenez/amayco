<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(BannersTableSeeder::class);
        $this->call(AboutsTableSeeder::class);
        $this->call(ExcursionsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(GalleriesTableSeeder::class);
        $this->call(ActivitiesTableSeeder::class);
        $this->call(TransfersTableSeeder::class);
        $this->call(AttentionsTableSeeder::class);
        $this->call(PoliticsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
    }
}
