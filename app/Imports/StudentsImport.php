<?php

namespace App\Imports;

use App\Student;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentsImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        return new Student([
            "nama" => $row["nama"],
            "nis" => $row["nis"],
            "nisn" => $row["nisn"],
            "kelas" => $row["kelas"],
            "ttl" => $row["ttl"],
            "jen_kel" => $row["jenis_kelamin"],
            "agama" => $row["agama"],
            "pend_sebelum" => $row["pendidikan_sebelum"],
            "alamat" => $row["alamat"],
            "nama_ayah" => $row["nama_ayah"],
            "nama_ibu" => $row["nama_ibu"],
            "pekerjaan_ayah" => $row["pekerjaan_ayah"],
            "pekerjaan_ibu" => $row["pekerjaan_ibu"],
            "alamat_ortu" => $row["alamat_ortu"],
            "nama_wali" => $row["nama_wali"],
            "pekerjaan_wali" => $row["pekerjaan_wali"],
            "alamat_wali" => $row["alamat_wali"],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.nama' => 'required',
            '*.nis' => 'unique:students',
            '*.nisn' => 'unique:students',
            '*.kelas' => 'required',
            '*.ttl' => 'required',
            '*.jenis_kelamin' => 'required',
            '*.agama' => 'required',
            '*.alamat' => 'required',
            '*.nama_ayah' => 'required',
            '*.nama_ibu' => 'required',
        ];
    }
}
