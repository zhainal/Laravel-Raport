<?php

namespace App\Http\Controllers;

use App\Imports\StudentsImport;
use App\Student;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view("students.index", ["students" => $students]);
    }

    public function import(Request $request)
    {
        // TODO: validasi file yang masuk
        $validation = Validator::make($request->all(), [
            "data_siswa" => "required|mimes:xlsx,xls"
        ])->validate();

        try {
            Excel::import(new StudentsImport, $request->file('data_siswa'));
        } catch (ValidationException $e) {
            $failures = $e->failures();
            $error = $failures[0]->errors()[0];
            return redirect()->route("students.index")->with('error', $error);
        }

        return redirect()->route("students.index")->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view("students.edit", compact('student'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        // * Validasi data yang diinput oleh user
        $validation = Validator::make($request->all(), [
            "nama" => "required",
            "nis" => "required",
            "nisn" => "required",
            "kelas" => "required",
            "ttl" => "required",
            "jenis_kelamin" => "required",
            "agama" => "required",
            "alamat" => "required",
            "nama_ayah" => "required",
            "nama_ibu" => "required"
        ])->validate();

        // * Cari user yang akan di update
        $student = Student::findOrFail($id);
        // * Masukkan data baru ke database
        $student->nama = $request->get('nama');
        $student->nis = $request->get('nis');
        $student->nisn = $request->get('nisn');
        $student->kelas = $request->get('kelas');
        $student->ttl = $request->get('ttl');
        $student->jen_kel = $request->get('jenis_kelamin');
        $student->agama = $request->get('agama');
        $student->pend_sebelum = $request->get('pend_sebelum');
        $student->alamat = $request->get('alamat');
        $student->nama_ayah = $request->get('nama_ayah');
        $student->nama_ibu = $request->get('nama_ibu');
        $student->pekerjaan_ayah = $request->get('pekerjaan_ayah');
        $student->pekerjaan_ibu = $request->get('pekerjaan_ibu');
        $student->alamat_ortu = $request->get('alamat_ortu');
        $student->nama_wali = $request->get('nama_wali');
        $student->pekerjaan_wali = $request->get('pekerjaan_wali');
        $student->alamat_wali = $request->get('pekerjaan_wali');

        $student->save();

        // * Redirect ke halaman index data siswa
        return redirect()->route('students.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Data berhasil dihapus');
    }
}
