<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;
use App\Imports\ExtraImport;
use App\Extra;

class ExtraController extends Controller
{
    public function index()
    {
        $extra = Extra::all();

        return view('extra.index', ['extra' => $extra]);
    }

    public function import(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "extra" => "required|mimes:xlsx,xls"
        ])->validate();

        try {
            Excel::import(new ExtraImport, $request->file('extra'));
        } catch (ValidationException $e) {
            $failures = $e->failures();
            $error = $failures[0]->errors()[0];
            return redirect()->route("extra.index")->with('error', $error);
        }

        return redirect()->route("extra.index")->with('success', 'Data Sikap berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            "saran" => "required",
            "pendengaran" => "required",
            "penglihatan" => "required",
            "gigi" => "required",
            "sakit" => "required",
            "ijin" => "required",
            "alfa" => "required",
        ]);

        $extra = Extra::findOrFail($id);

        $extra->ekskul = $request->ekskul;
        $extra->saran = $request->saran;
        $extra->tinggi_sem1 = $request->tinggi_sem1;
        $extra->tinggi_sem2 = $request->tinggi_sem2;
        $extra->berat_sem1 = $request->berat_sem1;
        $extra->berat_sem2 = $request->berat_sem2;
        $extra->pendengaran = $request->pendengaran;
        $extra->penglihatan = $request->penglihatan;
        $extra->gigi = $request->gigi;
        $extra->prestasi = $request->prestasi;
        $extra->jenis_prestasi = $request->jenis_prestasi;
        $extra->sakit = $request->sakit;
        $extra->ijin = $request->ijin;
        $extra->alfa = $request->alfa;

        $extra->save();

        return redirect()->route('extra.index');
    }

    public function edit($id)
    {
        $extra = Extra::findOrFail($id);

        return view('extra.edit', ['extra' => $extra]);
    }

    public function destroy($id)
    {
        $extra = Extra::findOrFail($id);

        $extra->delete();

        return back();
    }
}
