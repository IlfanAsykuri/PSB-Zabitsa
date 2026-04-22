<?php

namespace App\Exports;

use App\Models\Santri;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SantriExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        return Santri::with('lembaga')->get();
    }

    public function headings(): array
    {
        return [
            'Kode Pendaftaran',
            'Lembaga',
            'Nama Santri',
            'Tanggal Lahir',
            'Negara',
            'Provinsi',
            'Kabupaten/Kota',
            'Kecamatan',
            'Desa/Kelurahan',
            'Pendidikan Terakhir',
            'Nama Wali',
            'No WA Wali',
            'Tahun Masuk',
            'Status Kedatangan',
            'Status Verifikasi'
        ];
    }

    public function map($row): array
    {
        return [
            $row->kode_pendaftaran,
            $row->lembaga ? $row->lembaga->nama_lembaga : '-',
            $row->nama,
            $row->tanggal_lahir ? $row->tanggal_lahir->format('d/m/Y') : '-',
            $row->negara,
            $row->provinsi ?? '-',
            $row->kabupaten ?? '-',
            $row->kecamatan ?? '-',
            $row->desa ?? '-',
            $row->nama_pendidikan_terakhir,
            $row->nama_wali,
            $row->nomor_wa_wali,
            $row->tahun_masuk,
            $row->status_kedatangan_label,
            $row->status_verifikasi_label,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
