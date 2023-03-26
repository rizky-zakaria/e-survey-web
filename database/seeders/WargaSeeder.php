<?php

namespace Database\Seeders;

use App\Models\Warga;
use Illuminate\Database\Seeder;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Warga::create([
            'nik' => '757123456789',
            'nama' => 'Te Uwolo',
            'jk' => 'Pria',
            'tempat_lahir' => 'Gorontalo',
            'tgl_lahir' => '12-02-1998',
            'kota_id' => 1,
            'kecamatan_id' => 1,
            'desa_id' => 1,
            'alamat' => 'Jln. Kenanga No.1',
            'lat' => '0.1111111',
            'long' => '9.000000',
            'ktp' => 'ktp.jpg',
            'selfi' => 'selfi.jpg'
        ]);
    }
}
