<?php

namespace App\Http\Controllers;

use App\Imports\BahasaImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;
use App\Bahasa;

class BahasaController extends Controller
{
    public function index()
    {
        $bahasa = Bahasa::all();

        return view('bahasa.index', ['bahasa' => $bahasa]);
    }

    public function import(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "nilai_bahasa" => "required|mimes:xlsx,xls"
        ])->validate();

        try {
            Excel::import(new BahasaImport, $request->file('nilai_bahasa'));
        } catch (ValidationException $e) {
            $failures = $e->failures();
            $error = $failures[0]->errors()[0];
            return redirect()->route("bahasa.index")->with('error', $error);
        }

        return redirect()->route("bahasa.index")->with('success', 'Data Nilai berhasil ditambahkan');
    }

    public function show($id)
    {
        $bahasa = Bahasa::findOrFail($id);

        return view('bahasa.show', ['bahasa' => $bahasa]);
    }

    public function edit($id)
    {
        $bahasa = Bahasa::findOrFail($id);

        return view('bahasa.edit', ['bahasa' => $bahasa]);
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            "nilai_pengetahuan" => "required|min:0|max:100",
            "deskripsi_pengetahuan" => "required",
            "nilai_keterampilan" => "required|min:0|max:100",
            "deskripsi_keterampilan" => "required",
        ]);

        $bahasa = Bahasa::findOrFail($id);

        $bahasa->nilai_pengetahuan = $request->nilai_pengetahuan;
        $bahasa->deskripsi_pengetahuan = $request->deskripsi_pengetahuan;
        $bahasa->nilai_keterampilan = $request->nilai_keterampilan;
        $bahasa->deskripsi_keterampilan = $request->deskripsi_keterampilan;

        $bahasa->save();

        return redirect()->route('bahasa.index');
    }

    public function destroy($id)
    {
        $bahasa = Bahasa::findOrFail($id);
        $bahasa->delete();

        return redirect()->route('bahasa.index')->with('success', 'Data Nilai berhasil dihapus');
    }
}
