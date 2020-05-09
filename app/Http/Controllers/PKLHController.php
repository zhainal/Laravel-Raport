<?php

namespace App\Http\Controllers;

use App\Imports\PKLHImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;
use App\PKLH;

class PKLHController extends Controller
{
    public function index()
    {
        $PKLH = PKLH::all();
        return view("PKLH.index", ["PKLH" => $PKLH]);
    }

    public function import(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "nilai_PKLH" => "required|mimes:xlsx,xls"
        ])->validate();

        try {
            Excel::import(new PKLHImport, $request->file('nilai_PKLH'));
        } catch (ValidationException $e) {
            $failures = $e->failures();
            $error = $failures[0]->errors()[0];
            return redirect()->route("PKLH.index")->with('error', $error);
        }

        return redirect()->route("PKLH.index")->with('success', 'Data Nilai berhasil ditambahkan');
    }

    public function show($id)
    {
        $PKLH = PKLH::findOrFail($id);

        return view('PKLH.show', ['PKLH' => $PKLH]);
    }

    public function edit($id)
    {
        $PKLH = PKLH::findOrFail($id);

        return view('PKLH.edit', ['PKLH' => $PKLH]);
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            "nilai_pengetahuan" => "required|min:0|max:100",
            "deskripsi_pengetahuan" => "required",
            "nilai_keterampilan" => "required|min:0|max:100",
            "deskripsi_keterampilan" => "required",
        ]);

        $PKLH = PKLH::findOrFail($id);

        $PKLH->nilai_pengetahuan = $request->nilai_pengetahuan;
        $PKLH->deskripsi_pengetahuan = $request->deskripsi_pengetahuan;
        $PKLH->nilai_keterampilan = $request->nilai_keterampilan;
        $PKLH->deskripsi_keterampilan = $request->deskripsi_keterampilan;

        $PKLH->save();

        return redirect()->route('PKLH.index');
    }

    public function destroy($id)
    {
        $PKLH = PKLH::findOrFail($id);
        $PKLH->delete();

        return redirect()->route('PKLH.index')->with('success', 'Data Nilai berhasil dihapus');
    }
}
