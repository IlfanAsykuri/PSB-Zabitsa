<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Santri;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSantri     = Santri::count();
        $sudahDatang     = Santri::where('status_kedatangan', 'sudah_datang')->count();
        $belumDatang     = Santri::where('status_kedatangan', 'belum_datang')->count();
        $diverifikasi    = Santri::where('status_verifikasi', 'diverifikasi')->count();
        $ditolak         = Santri::where('status_verifikasi', 'ditolak')->count();
        $prosesVerif     = Santri::where('status_verifikasi', 'proses')->count();

        // Group by education level for chart berdasarkan Lembaga Tujuan (kode_lembaga)
        $eduRaw = Santri::select('kode_lembaga', DB::raw('count(*) as total'))
            ->groupBy('kode_lembaga')
            ->get();

        $eduGroups = [
            'Tingkat Dasar (MI/SD)' => 0,
            'SLTP (SMP/MTs)' => 0,
            'SLTA (SMA/MA/SMK)' => 0,
            'Lainnya' => 0
        ];

        foreach ($eduRaw as $row) {
            // Ubah kode lembaga menjadi huruf kecil untuk mempermudah pengecekan
            // Contoh kode: minm, smp-nj, mts-nj, manj, sma-nj, smk-nj, unuja, khorijin
            $kode = strtolower($row->kode_lembaga);

            if (str_contains($kode, 'mi') || str_contains($kode, 'sd')) {
                $eduGroups['Tingkat Dasar (MI/SD)'] += $row->total;
            } elseif (str_contains($kode, 'mts') || str_contains($kode, 'smp')) {
                $eduGroups['SLTP (SMP/MTs)'] += $row->total;
            } elseif (str_contains($kode, 'ma') || str_contains($kode, 'sma') || str_contains($kode, 'smk')) {
                $eduGroups['SLTA (SMA/MA/SMK)'] += $row->total;
            } else {
                // Untuk kode lembaga seperti 'unuja' atau 'khorijin' akan masuk ke sini
                $eduGroups['Lainnya'] += $row->total;
            }
        }

        // Recent registrations
        $recentSantri = Santri::with('lembaga')
            ->orderByDesc('created_at')
            ->take(5)
            ->get();

        return view('vendor.backpack.ui.dashboard', compact(
            'totalSantri',
            'sudahDatang',
            'belumDatang',
            'diverifikasi',
            'ditolak',
            'prosesVerif',
            'eduGroups',
            'recentSantri'
        ));
    }
}
