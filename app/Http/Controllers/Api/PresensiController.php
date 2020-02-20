<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Place;

class PresensiController extends Controller
{
    public function store(Request $request)
    {
        $place = Place::where("user_id", Auth::user()->id)->whereDay("time", date("d"))->first();
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
                "user_id"   => Auth::user()->id
            ]);

            return response()->json([
                "message"   => "Berhasil mengisi Presensi hari ini",
                "data"      => $data
            ]);
        }
    }
}
