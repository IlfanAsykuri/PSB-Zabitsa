<?php

namespace App\Exports;

use App\Models\Santri;
use App\Models\Logistik;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SantriLogistikExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    protected $masters;

    public function __construct()
    {
        // Fetch masters once to prevent N+1 bottleneck when mapping 
        $this->masters = Logistik::where('status', 'aktif')->get();
    }

    public function collection()
    {
        return Santri::with(['logistik.petugasLogistik'])->orderBy('kode_pendaftaran')->get();
    }

    public function headings(): array
    {
        $headers = [
            'Kode Pendaftaran',
            'Nama Santri',
        ];

        // Dynamically Expand Column Headers Automatically 
        foreach ($this->masters as $master) {
            $headers[] = $master->nama_logistik;
            $headers[] = 'Ukuran';
            $headers[] = 'Status';
        }

        $headers[] = 'Tanggal Diserahkan (Terakhir)';
        $headers[] = 'Diserahkan Oleh';

        return $headers;
    }

    public function map($santri): array
    {
        $row = [
            $santri->kode_pendaftaran,
            $santri->nama,
        ];

        $latestDate = null;
        $adminName = '-';

        foreach ($this->masters as $master) {
            $item = $santri->logistik->where('kode_logistik', $master->kode_logistik)->first();

            if ($item) {
                $row[] = 'Ya';
                $row[] = $item->ukuran ?? '-';
                $row[] = ($item->status_penyerahan === 'sudah_diserahkan') ? 'Sudah Diserahkan' : 'Belum';

                // Evaluate chronologically newest transaction instance
                if ($item->tanggal_diserahkan) {
                    if (is_null($latestDate) || $item->tanggal_diserahkan->gt($latestDate)) {
                        $latestDate = $item->tanggal_diserahkan;
                        $adminName = $item->petugasLogistik ? $item->petugasLogistik->name : '-';
                    }
                }
            } else {
                $row[] = '-';
                $row[] = '-';
                $row[] = '-';
            }
        }

        $row[] = $latestDate ? $latestDate->format('d/m/Y H:i') : '-';
        $row[] = $adminName;

        return $row;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
