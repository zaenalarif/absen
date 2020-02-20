<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class PegawaiController extends Controller
{
    public function index()
    {
            $users = User::where("role", 1)->get();
        return view("pegawai.index", compact("users"));
    }

    public function create()
    {
        return view("pegawai.create");
    }

    public function store(Request $request)
    {
        // validasi
        $user = User::create([
            "name"          => $request->nama,
            "nip"           => $request->nip,
            "password"      => Hash::make($request->password),
            "role"          => 1,
        ]);

        return redirect("/pegawai")->with("msg", "Akun Pegawai Berhasil dibuat");
    }

    public function show($id){

        $user = User::findOrFail($id);

        return view("pegawai.show", compact("user"));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view("pegawai.edit", compact("user"));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // validasi

        $user->update([
            "name"          => $request->nama,
            "nip"           => $request->nip,
            "password"      => Hash::make($request->password),
        ]);

        return redirect("/pegawai")->with("msg", $request->nama . " sudah terupdate");
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect("/pegawai")->with("msg", "Pegawai berhasil di hapus");
    }
}
