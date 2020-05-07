<?php

namespace App\Imports;

use App\Extra;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ExtraImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        return new Extra([
            "nis" => $row["nis"],
            "saran" => $row["saran"],
            "ekskul" => $row["ekskul"],
            "tinggi_sem1" => $row["tinggi_sem1"],
            "tinggi_sem2" => $row["tinggi_sem2"],
            "berat_sem1" => $row["berat_sem1"],
            "berat_sem2" => $row["berat_sem2"],
            "pendengaran" => $row["pendengaran"],
            "penglihatan" => $row["penglihatan"],
            "gigi" => $row["gigi"],
            "prestasi" => $row["prestasi"],
            "jenis_prestasi" => $row["jenis_prestasi"],
            "sakit" => $row["sakit"],
            "ijin" => $row["ijin"],
            "alfa" => $row["alfa"],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.nis' => 'required',
            '*.saran' => 'required',
            '*.pendengaran' => 'required',
            '*.penglihatan' => 'required',
            '*.gigi' => 'required',
            '*.sakit' => 'required',
            '*.ijin' => 'required',
            '*.alfa' => 'required',
        ];
    }
}
