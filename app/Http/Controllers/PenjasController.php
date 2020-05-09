<?php

namespace App\Http\Controllers;

use App\Imports\PenjasImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;
use App\Penjas;

class PenjasController extends Controller
{
    public function index()
    {
        $penjas = Penjas::all();
        return view("penjas.index", ["penjas" => $penjas]);
    }

    public function import(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "nilai_penjas" => "required|mimes:xlsx,xls"
        ])->validate();

        try {
            Excel::import(new PenjasImport, $request->file('nilai_penjas'));
        } catch (ValidationException $e) {
            $failures = $e->failures();
            $error = $failures[0]->errors()[0];
            return redirect()->route("penjas.index")->with('error', $error);
        }

        return redirect()->route("penjas.index")->with('success', 'Data Nilai berhasil ditambahkan');
    }

    public function show($id)
    {
        $penjas = Penjas::findOrFail($id);

        return view('penjas.show', ['penjas' => $penjas]);
    }

    public function edit($id)
    {
        $penjas = Penjas::findOrFail($id);

        return view('penjas.edit', ['penjas' => $penjas]);
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            "nilai_pengetahuan" => "required|min:0|max:100",
            "deskripsi_pengetahuan" => "required",
            "nilai_keterampilan" => "required|min:0|max:100",
            "deskripsi_keterampilan" => "required",
        ]);

        $penjas = Penjas::findOrFail($id);

        $penjas->nilai_pengetahuan = $request->nilai_pengetahuan;
        $penjas->deskripsi_pengetahuan = $request->deskripsi_pengetahuan;
        $penjas->nilai_keterampilan = $request->nilai_keterampilan;
        $penjas->deskripsi_keterampilan = $request->deskripsi_keterampilan;

        $penjas->save();

        return redirect()->route('penjas.index');
    }

    public function destroy($id)
    {
        $penjas = Penjas::findOrFail($id);
        $penjas->delete();

        return redirect()->route('penjas.index')->with('success', 'Data Nilai berhasil dihapus');
    }
}
