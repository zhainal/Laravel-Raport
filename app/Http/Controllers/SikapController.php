<?php

namespace App\Http\Controllers;

use App\Imports\SikapImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;
use App\Sikap;

class SikapController extends Controller
{
    public function index()
    {
        $sikap = Sikap::all();
        return view('sikap.index', ['sikap' => $sikap]);
    }

    public function import(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "sikap" => "required|mimes:xlsx,xls"
        ])->validate();

        try {
            Excel::import(new SikapImport, $request->file('sikap'));
        } catch (ValidationException $e) {
            $failures = $e->failures();
            $error = $failures[0]->errors()[0];
            return redirect()->route("sikap.index")->with('error', $error);
        }

        return redirect()->route("sikap.index")->with('success', 'Data Sikap berhasil ditambahkan');
    }

    public function edit($id)
    {
        $sikap = Sikap::findOrFail($id);

        return view('sikap.edit', ['sikap' => $sikap]);
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            "sikap_spiritual" => "required",
            "sikap_sosial" => "required",
        ]);

        $sikap = Sikap::findOrFail($id);

        $sikap->sikap_spiritual = $request->sikap_spiritual;
        $sikap->sikap_sosial = $request->sikap_sosial;

        $sikap->save();

        return redirect()->route('sikap.index');
    }

    public function destroy($id)
    {
        $sikap = Sikap::findOrFail($id);

        $sikap->delete();

        return back();
    }
}
