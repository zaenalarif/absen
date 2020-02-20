<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PresensiLemburController extends Controller
{
    public function store(Request $request)
    {
        /**
         * masih bug di hari libur
         */
        $lembur_mulai  = Jadwal::where("nama_lain", date("l"))->pluck("lembur_mulai")->first();
        $lembur_selesai= Jadwal::where("nama_lain", date("l"))->pluck("lembur_selesai")->first();
        
        $current_time   = date("H:i:s");
        $sunrise        = $jam_mulai;
        $sunset         = $jam_selesai;
        $date1 = DateTime::createFromFormat('H:i:s', $current_time);
        $date2 = DateTime::createFromFormat('H:i:s', $sunrise);
        $date3 = DateTime::createFromFormat('H:i:s', $sunset);

        if ($date1 > $date2 && $date1 < $date3)
        {
            /**
             * kode 0 untuk jam kerja asli
             * kode 1 untuk jam kerja lembur
             */
            $place = Place::where("user_id", Auth::user()->id)->whereDay([
                ["time", date("d")],
                ["status", 1]
            ])->first();
            if(!empty($place)) {
                return response()->json([
                    "message"   => "Presensi Sudah di masukkan"
                ]);
            }else{
                $data = Place::create([
                    "image"     => $request->image,
                    "latitude"  => $request->latitude,
                    "longtitude"=> $request->longtitude,
                    "time"      => date("Y-m-d H:i:s"),
                    "desa"      => $request->desa,
                    "kecamatan" => $request->kecamatan,
                    "status" => 1,
                    "user_id"   => Auth::user()->id
                ]);
    
                return response()->json([
                    "message"   => "Berhasil mengisi Presensi hari ini",
                    "data"      => $data
                ]);
            }

        }else{
            return response()->json([
                "message" => "jam kerja sudah selesai, jam kerja antara $sunrise sampai $sunset "
            ]);
        }

    }
}
