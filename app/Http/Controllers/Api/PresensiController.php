<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Auth;
use App\Place;
use App\Jadwal;
use DateTime;

class PresensiController extends Controller
{
    public function store(Request $request)
    {
        
        $jam_mulai  = Jadwal::where("nama_lain", date("l"))->pluck("jam_mulai")->first();
        $jam_selesai= Jadwal::where("nama_lain", date("l"))->pluck("jam_selesai")->first();
        
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
            
            $place = Place::where("user_id", Auth::user()->id)
                            ->whereDay("time", date("d"))
                            ->where("status", "=", 0)
                            ->first();
            
            if(!empty($place)) {
                return response()->json([
                    "message"   => "Presensi Sudah di masukkan"
                ]);
            }else{
                /**
                 * TODO 
                 * validasi field
                 */
                $this->validate($request, [
                    "image"     => "required",
                    "latitude"  => "required",
                    "longtitude"=> "required",
                    "desa"      => "required",
                    "kecamatan" => "required",
                ]);

                $file = $request->file("image");

                $ext    = $file->getClientOriginalExtension();
                $name   = Str::random(20) .time();

                $file->storeAs(
                    "presensi", $name . ".png"
                );

                $data = Place::create([
                    "image"     => $name,
                    "latitude"  => $request->latitude,
                    "longtitude"=> $request->longtitude,
                    "time"      => date("Y-m-d H:i:s"),
                    "desa"      => $request->lokasi,
                    "status"    => 0,
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
