<?php

namespace App\Http\Controllers;

use App\Imports\IPAImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;
use App\IPA;

class IPAController extends Controller
{
    public function index()
    {
        $IPA = IPA::all();
        return view("IPA.index", ["IPA" => $IPA]);
    }

    public function import(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "nilai_IPA" => "required|mimes:xlsx,xls"
        ])->validate();

        try {
            Excel::import(new IPAImport, $request->file('nilai_IPA'));
        } catch (ValidationException $e) {
            $failures = $e->failures();
            $error = $failures[0]->errors()[0];
            return redirect()->route("IPA.index")->with('error', $error);
        }

        return redirect()->route("IPA.index")->with('success', 'Data Nilai berhasil ditambahkan');
    }

    public function show($id)
    {
        $IPA = IPA::findOrFail($id);

        return view('IPA.show', ['IPA' => $IPA]);
    }

    public function edit($id)
    {
        $IPA = IPA::findOrFail($id);

        return view('IPA.edit', ['IPA' => $IPA]);
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            "nilai_pengetahuan" => "required|min:0|max:100",
            "deskripsi_pengetahuan" => "required",
            "nilai_keterampilan" => "required|min:0|max:100",
            "deskripsi_keterampilan" => "required",
        ]);

        $IPA = IPA::findOrFail($id);

        $IPA->nilai_pengetahuan = $request->nilai_pengetahuan;
        $IPA->deskripsi_pengetahuan = $request->deskripsi_pengetahuan;
        $IPA->nilai_keterampilan = $request->nilai_keterampilan;
        $IPA->deskripsi_keterampilan = $request->deskripsi_keterampilan;

        $IPA->save();

        return redirect()->route('IPA.index');
    }

    public function destroy($id)
    {
        $IPA = IPA::findOrFail($id);
        $IPA->delete();

        return redirect()->route('IPA.index')->with('success', 'Data Nilai berhasil dihapus');
    }
}
