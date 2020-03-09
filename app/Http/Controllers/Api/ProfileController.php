<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use User;
use Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $id = Auth::user()->id;
        $user = Auth::where("id", $id)->get();

        return response()->json([
            "data"      => $user,
            "message"   => "data anda ditampilkan"
        ]);
    }

    
}
