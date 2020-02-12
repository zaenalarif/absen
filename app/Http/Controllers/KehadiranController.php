<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use App\User;

class KehadiranController extends Controller
{
    public function index()
    {
        $users = User::with("kehadirans")->where("role", 2)->get();
        return view("kehadiran.index", compact("users"));
    }

    public function hariIni()
    {
        $places = Place::with("user")->get();

        return view("kehadiran.hari_ini", compact("places"));
    }

}
