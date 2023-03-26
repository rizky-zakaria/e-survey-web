<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'nama',
        'jk',
        'tempat_lahir',
        'tgl_lahir',
        'pekerjaan',
        'kota',
        'kecamatan',
        'desa',
        'alamat',
        'latitude',
        'longitude',
        'ktp',
        'selfi'
    ];
}
