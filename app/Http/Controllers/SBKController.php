<?php

namespace App\Http\Controllers;

use App\Imports\SBKImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;
use App\SBK;

class SBKController extends Controller
{
    public function index()
    {
        $SBK = SBK::all();
        return view("SBK.index", ["SBK" => $SBK]);
    }

    public function import(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "nilai_SBK" => "required|mimes:xlsx,xls"
        ])->validate();

        try {
            Excel::import(new SBKImport, $request->file('nilai_SBK'));
        } catch (ValidationException $e) {
            $failures = $e->failures();
            $error = $failures[0]->errors()[0];
            return redirect()->route("SBK.index")->with('error', $error);
        }

        return redirect()->route("SBK.index")->with('success', 'Data Nilai berhasil ditambahkan');
    }

    public function show($id)
    {
        $SBK = SBK::findOrFail($id);

        return view('SBK.show', ['SBK' => $SBK]);
    }

    public function edit($id)
    {
        $SBK = SBK::findOrFail($id);

        return view('SBK.edit', ['SBK' => $SBK]);
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            "nilai_pengetahuan" => "required|min:0|max:100",
            "deskripsi_pengetahuan" => "required",
            "nilai_keterampilan" => "required|min:0|max:100",
            "deskripsi_keterampilan" => "required",
        ]);

        $SBK = SBK::findOrFail($id);

        $SBK->nilai_pengetahuan = $request->nilai_pengetahuan;
        $SBK->deskripsi_pengetahuan = $request->deskripsi_pengetahuan;
        $SBK->nilai_keterampilan = $request->nilai_keterampilan;
        $SBK->deskripsi_keterampilan = $request->deskripsi_keterampilan;

        $SBK->save();

        return redirect()->route('SBK.index');
    }

    public function destroy($id)
    {
        $SBK = SBK::findOrFail($id);
        $SBK->delete();

        return redirect()->route('SBK.index')->with('success', 'Data Nilai berhasil dihapus');
    }
}
