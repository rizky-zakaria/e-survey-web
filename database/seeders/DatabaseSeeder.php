<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call(DesaSeeder::class);
        $this->call(KecamatanSeeder::class);
        $this->call(KotaSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(WargaSeeder::class);
        $this->call(SurveySeeder::class);
        $this->call(PertanyaanSeeder::class);
        $this->call(JawabanSeeder::class);
    }
}
