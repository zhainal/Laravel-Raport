<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use Illuminate\Support\Facades\Validator;

class SchoolController extends Controller
{
    public function index()
    {
        $school = School::where("npsn", "30402873")->first();

        return view('schools.index', ['school' => $school]);
    }

    public function edit($id)
    {
        $school = School::findOrFail($id);
        return view('schools.edit', ['school' => $school]);
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            "nama" => "required",
            "npsn" => "required",
            "alamat" => "required",
            "kode_pos" => "required",
            "kelurahan" => "required",
            "kecamatan" => "required",
            "provinsi" => "required",
            "email" => "email",
            "no_telp" => "required",
            "kepsek" => "required",
            "nip_kepsek" => "required",
        ]);

        $school = School::findOrFail($id);

        $school->nama = $request->nama;
        $school->npsn = $request->npsn;
        $school->alamat = $request->alamat;
        $school->kode_pos = $request->kode_pos;
        $school->kelurahan = $request->kelurahan;
        $school->kecamatan = $request->kecamatan;
        $school->provinsi = $request->provinsi;
        $school->email = $request->email;
        $school->website = $request->website;
        $school->no_telp = $request->no_telp;
        $school->kepsek = $request->kepsek;
        $school->nip_kepsek = $request->nip_kepsek;

        $school->save();

        return redirect()->route('schools.index');
    }
}
