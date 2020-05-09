<?php

namespace App\Imports;

use App\PKLH;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class PKLHImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        return new PKLH([
            "nis" => $row["nis"],
            "nilai_pengetahuan" => $row["nilai_pengetahuan"],
            "deskripsi_pengetahuan" => $row["deskripsi_pengetahuan"],
            "nilai_keterampilan" => $row["nilai_keterampilan"],
            "deskripsi_keterampilan" => $row["deskripsi_keterampilan"],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.nis' => 'required',
            '*.nilai_pengetahuan' => 'required',
            '*.deskripsi_pengetahuan' => 'required',
            '*.nilai_keterampilan' => 'required',
            '*.deskripsi_keterampilan' => 'required',
        ];
    }
}
