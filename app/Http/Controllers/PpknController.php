<?php

namespace App\Http\Controllers;

use App\Imports\PpknImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;
use App\Ppkn;
use App\Student;

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

    public function destroy($id)
    {
        $ppkn = Ppkn::findOrFail($id);
        $ppkn->delete();

        return redirect()->route('ppkn.index')->with('success', 'Data Nilai berhasil dihapus');
    }

    public function test()
    {
        $student = Student::findOrFail(1);
        dd($student->ppkn());

        return $student;
    }
}
