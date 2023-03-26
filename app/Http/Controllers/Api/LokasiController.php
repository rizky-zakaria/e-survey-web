<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Kota;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function getDesa()
    {
        $data = Desa::all();
        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil mendapatkan data',
                'data' => $data
            ]);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil mendapatkan data'
            ]);
        }
    }

    public function getKecamatan()
    {
        $data = Kecamatan::all();
        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil mendapatkan data',
                'data' => $data
            ]);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil mendapatkan data'
            ]);
        }
    }

    public function getKota()
    {
        $data = Kota::all();
        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil mendapatkan data',
                'data' => $data
            ]);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil mendapatkan data'
            ]);
        }
    }
}
