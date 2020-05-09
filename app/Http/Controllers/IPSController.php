<?php

namespace App\Http\Controllers;

use App\Imports\IPSImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;
use App\IPS;

class IPSController extends Controller
{
    public function index()
    {
        $IPS = IPS::all();
        return view("IPS.index", ["IPS" => $IPS]);
    }

    public function import(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "nilai_IPS" => "required|mimes:xlsx,xls"
        ])->validate();

        try {
            Excel::import(new IPSImport, $request->file('nilai_IPS'));
        } catch (ValidationException $e) {
            $failures = $e->failures();
            $error = $failures[0]->errors()[0];
            return redirect()->route("IPS.index")->with('error', $error);
        }

        return redirect()->route("IPS.index")->with('success', 'Data Nilai berhasil ditambahkan');
    }

    public function show($id)
    {
        $IPS = IPS::findOrFail($id);

        return view('IPS.show', ['IPS' => $IPS]);
    }

    public function edit($id)
    {
        $IPS = IPS::findOrFail($id);

        return view('IPS.edit', ['IPS' => $IPS]);
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            "nilai_pengetahuan" => "required|min:0|max:100",
            "deskripsi_pengetahuan" => "required",
            "nilai_keterampilan" => "required|min:0|max:100",
            "deskripsi_keterampilan" => "required",
        ]);

        $IPS = IPS::findOrFail($id);

        $IPS->nilai_pengetahuan = $request->nilai_pengetahuan;
        $IPS->deskripsi_pengetahuan = $request->deskripsi_pengetahuan;
        $IPS->nilai_keterampilan = $request->nilai_keterampilan;
        $IPS->deskripsi_keterampilan = $request->deskripsi_keterampilan;

        $IPS->save();

        return redirect()->route('IPS.index');
    }

    public function destroy($id)
    {
        $IPS = IPS::findOrFail($id);
        $IPS->delete();

        return redirect()->route('IPS.index')->with('success', 'Data Nilai berhasil dihapus');
    }
}
