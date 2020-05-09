<?php

namespace App\Http\Controllers;

use App\Imports\PpknImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;
use App\Ppkn;

class PpknController extends Controller
{
    public function index()
    {
        $ppkn = Ppkn::all();
        return view("ppkn.index", ["ppkn" => $ppkn]);
    }

    public function import(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "nilai_ppkn" => "required|mimes:xlsx,xls"
        ])->validate();

        try {
            Excel::import(new PpknImport, $request->file('nilai_ppkn'));
        } catch (ValidationException $e) {
            $failures = $e->failures();
            $error = $failures[0]->errors()[0];
            return redirect()->route("ppkn.index")->with('error', $error);
        }

        return redirect()->route("ppkn.index")->with('success', 'Data Nilai berhasil ditambahkan');
    }

    public function show($id)
    {
        $ppkn = Ppkn::findOrFail($id);

        return view('ppkn.show', ['ppkn' => $ppkn]);
    }

    public function edit($id)
    {
        $ppkn = Ppkn::findOrFail($id);

        return view('ppkn.edit', ['ppkn' => $ppkn]);
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            "nilai_pengetahuan" => "required|min:0|max:100",
            "deskripsi_pengetahuan" => "required",
            "nilai_keterampilan" => "required|min:0|max:100",
            "deskripsi_keterampilan" => "required",
        ]);

        $ppkn = Ppkn::findOrFail($id);

        $ppkn->nilai_pengetahuan = $request->nilai_pengetahuan;
        $ppkn->deskripsi_pengetahuan = $request->deskripsi_pengetahuan;
        $ppkn->nilai_keterampilan = $request->nilai_keterampilan;
        $ppkn->deskripsi_keterampilan = $request->deskripsi_keterampilan;

        $ppkn->save();

        return redirect()->route('ppkn.index');
    }

    public function destroy($id)
    {
        $ppkn = Ppkn::findOrFail($id);
        $ppkn->delete();

        return redirect()->route('ppkn.index')->with('success', 'Data Nilai berhasil dihapus');
    }
}
