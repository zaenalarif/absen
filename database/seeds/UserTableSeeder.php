<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            [
                'name'      => "zaenal",
                'nip'       => "99",
                'password'  => Hash::make("11111111"),
                "role"      => "3",
            ],
            [
                'name'      => "Excate",
                'nip'       => "9890098012",
                'password'  => Hash::make("11111111"),
                "role"      => "2",
            ],
            [
                'name'      => "Caex",
                'nip'       => "837493874",
                'password'  => Hash::make("11111111"),
                "role"      => "1",
            ]
        ]);
    }
}
