<?php

use Illuminate\Database\Seeder;
use App\School;

class SchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        School::create([
            "nama" => "SD Negeri 012 Balikpapan Utara",
            "npsn" => "30402873",
            "alamat" => "Jl. Giri Mulyo KM.14 RT.22",
            "kode_pos" => "76217",
            "no_telp" => "054272217016",
            "kelurahan" => "Karang Joang",
            "kecamatan" => "Balikpapan Utara",
            "kota" => "Balikpapan",
            "provinsi" => "Kalimantan Timur",
            "email" => "sdn012balut@gmail.com",
            "kepsek" => "Dra. Isti Warsini",
            "nip_kepsek" => "196409071986102005"
        ]);
    }
}
