<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Place;
use App\User;

class KehadiranController extends Controller
{
    /**
     * TODO 
     * aku ingin menampilkan user yang bekerja ditanggal mulai sampai tangl akhir
     * 
     */
    public function index(Request $request)
    {
        $mulai      = urlencode($request->mulai);
        $selesai    = urlencode($request->selesai);
        $waktu      = urlencode($request->waktu);
        
        if(!empty($mulai) && !empty($selesai) && !empty($waktu)){
            if ($waktu == "pagi"){
                $user = User::with(["kehadirans" => function($query) use($mulai, $selesai, $waktu){
                    $query->whereBetween("time", [date($mulai), date($selesai)])->where("status", 0 );
                }])->where("role", 1)->get();         
                
            }
            // auto sore
            else{

            }
            
            return view("kehadiran.index", compact(["user", "mulai", "selesai"]));
        }
        else{
            // $users = User::get();
            // return view("kehadiran.index", compact("user"));
        }
        
        
    }

}
