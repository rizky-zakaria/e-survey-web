<?php

namespace Database\Seeders;

use App\Models\Jawaban;
use Illuminate\Database\Seeder;

class JawabanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jawaban::create([
            'a' => 'Joko Widodo',
            'b' => 'Prabowo Subianto',
            'c' => 'Ganjar Pranowo',
            'd' => 'Anis Baswedan',
            'pertanyaan_id' => 1
        ]);
    }
}
