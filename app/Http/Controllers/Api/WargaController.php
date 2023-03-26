<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WargaController extends Controller
{
    public function postBiodata(Request $request)
    {
        $image_selfi = $request->selfi;
        $image_selfi = str_replace('data:image/png;base64,', '', $image_selfi);
        $image_selfi = str_replace(' ', '+', $image_selfi);
        $imageNameSelfi = 'IMGSELFI' . date('dmYHis') . rand(0, 9999) . '.' . 'jpg';
        $saveSelfi = File::put(public_path() . '/uploads/img/selfi/' . $imageNameSelfi, base64_decode($image_selfi));

        $data = Warga::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'desa' => $request->desa,
            'alamat' => $request->alamat,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'ktp' => '-',
            'selfi' => '-',
            'pekerjaan' => $request->pekerjaan
        ]);
        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil menambahkan data'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan data'
            ]);
        }
    }

    public function getWarga()
    {
        $data = Warga::orderBy('created_at', 'desc')->get();
        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil mendapatkan data!',
                'data' => $data
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mendapatkan data'
            ]);
        }
    }

    public function postKtp(Request $request)
    {
        $image_ktp = $request->ktp;
        $image_ktp = str_replace('data:image/png;base64,', '', $image_ktp);
        $image_ktp = str_replace(' ', '+', $image_ktp);
        $imageNameKtp = 'IMGKTP' . date('dmYHis') . rand(0, 9999) . '.' . 'jpg';
        $saveKtp = File::put(public_path() . '/uploads/img/ktp/' . $imageNameKtp, base64_decode($image_ktp));

        $data = Warga::find($request->id);
        $data->ktp = $imageNameKtp;
        $data->update();

        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil mengubah data!'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengubah data'
            ]);
        }
    }

    public function postSelfi(Request $request)
    {
        $image_selfi = $request->selfi;
        $image_selfi = str_replace('data:image/png;base64,', '', $image_selfi);
        $image_selfi = str_replace(' ', '+', $image_selfi);
        $imageNameSelfi = 'IMGSELFI' . date('dmYHis') . rand(0, 9999) . '.' . 'jpg';
        $saveSelfi = File::put(public_path() . '/uploads/img/selfi/' . $imageNameSelfi, base64_decode($image_selfi));

        $data = Warga::find($request->id);
        $data->selfi = $imageNameSelfi;
        $data->update();

        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil mengubah data!'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengubah data'
            ]);
        }
    }
}
