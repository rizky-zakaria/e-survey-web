<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hasil;
use App\Models\Pertanyaan;
use App\Models\Survey;
use App\Models\TemporaryJawaban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PertanyaanController extends Controller
{

    public function getSurvey()
    {
        $data = Survey::all();
        if ($data) {
            return response([
                'success' => true,
                'message' => 'Berhasil mendapatkan data!',
                'data' => $data
            ]);
        } else {
            return response([
                'success' => false,
                'message' => 'Gagal mendapatkan data!'
            ]);
        }
    }

    public function getPertanyaan()
    {
        $data = Pertanyaan::join('jawabans', 'jawabans.pertanyaan_id', '=', 'pertanyaans.id')->get();
        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil mendapatkan data!',
                'data' => $data
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mendapatkan data!'
            ]);
        }
    }

    public function getPertanyaanById(Request $request)
    {
        // $data = Pertanyaan::join('jawabans', 'jawabans.pertanyaan_id', '=', 'pertanyaans.id')
        //     ->where('pertanyaans.survey_id', $request->survey_id)
        //     ->where('pertanyaans.id', $request->id)
        //     ->first();
        $warga_id = $request->warga_id;
        $data = DB::table('pertanyaans')
            ->join('jawabans', 'jawabans.pertanyaan_id', '=', 'pertanyaans.id')
            ->whereNotIn('pertanyaans.id', function ($q) {
                $q->select('pertanyaan_id')->from('temporary_jawabans');
            })
            ->where('pertanyaans.survey_id', $request->survey_id)
            ->first(['pertanyaans.id', 'pertanyaans.pertanyaan', 'jawabans.a', 'jawabans.b', 'jawabans.c', 'jawabans.d', 'pertanyaans.survey_id']);

        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil mendapatkan data!',
                'data' => $data
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mendapatkan data!'
            ]);
        }
    }

    public function postJawabanById(Request $request)
    {
        $cek = Hasil::where('warga_id', $request->warga_id)
            ->where('pertanyaan_id', $request->pertanyaan_id)
            ->first();

        if ($cek != []) {
            return response()->json([
                'success' => false,
                'message' => 'Data sudah ada!',
                'data' => $cek
            ]);
        } else {

            $temp = TemporaryJawaban::create([
                'warga_id' => $request->warga_id,
                'pertanyaan_id' => $request->pertanyaan_id,
                'jawaban' => $request->jawaban,
                'user_id' => $request->user_id
            ]);

            $data = Hasil::create([
                'warga_id' => $request->warga_id,
                'pertanyaan_id' => $request->pertanyaan_id,
                'jawaban' => $request->jawaban
            ]);

            if ($data) {
                return response()->json([
                    'success' => true,
                    'message' => 'Berhasil melakukan submit data!',
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal melakukan submit data!'
                ]);
            }
        }
    }

    public function delTemporary(Request $request)
    {
        $post = TemporaryJawaban::where('user_id', $request->user_id)->get();
        for ($i = 0; $i < count($post); $i++) {
            $del = TemporaryJawaban::find($post[$i]->id);
            $del->delete();
        }

        if ($post) {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil menghapus data!',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus data!'
            ]);
        }
    }
}
