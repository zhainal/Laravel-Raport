<?php

namespace App\Http\Controllers;

use App\Imports\MatematikaImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;
use App\Matematika;

class MatematikaController extends Controller
{
    public function index()
    {
        $matematika = Matematika::all();
        return view("matematika.index", ["matematika" => $matematika]);
    }

    public function import(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "nilai_matematika" => "required|mimes:xlsx,xls"
        ])->validate();

        try {
            Excel::import(new MatematikaImport, $request->file('nilai_matematika'));
        } catch (ValidationException $e) {
            $failures = $e->failures();
            $error = $failures[0]->errors()[0];
            return redirect()->route("matematika.index")->with('error', $error);
        }

        return redirect()->route("matematika.index")->with('success', 'Data Nilai berhasil ditambahkan');
    }

    public function show($id)
    {
        $matematika = Matematika::findOrFail($id);

        return view('matematika.show', ['matematika' => $matematika]);
    }

    public function edit($id)
    {
        $matematika = Matematika::findOrFail($id);

        return view('matematika.edit', ['matematika' => $matematika]);
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            "nilai_pengetahuan" => "required|min:0|max:100",
            "deskripsi_pengetahuan" => "required",
            "nilai_keterampilan" => "required|min:0|max:100",
            "deskripsi_keterampilan" => "required",
        ]);

        $matematika = Matematika::findOrFail($id);

        $matematika->nilai_pengetahuan = $request->nilai_pengetahuan;
        $matematika->deskripsi_pengetahuan = $request->deskripsi_pengetahuan;
        $matematika->nilai_keterampilan = $request->nilai_keterampilan;
        $matematika->deskripsi_keterampilan = $request->deskripsi_keterampilan;

        $matematika->save();

        return redirect()->route('matematika.index');
    }

    public function destroy($id)
    {
        $matematika = Matematika::findOrFail($id);
        $matematika->delete();

        return redirect()->route('matematika.index')->with('success', 'Data Nilai berhasil dihapus');
    }
}
