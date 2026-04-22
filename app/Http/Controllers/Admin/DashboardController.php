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

        // Group by education level for chart
        // Map nama_pendidikan_terakhir to categories
        $eduRaw = Santri::select('nama_pendidikan_terakhir', DB::raw('count(*) as total'))
            ->groupBy('nama_pendidikan_terakhir')
            ->get();

        $eduGroups = ['Tingkat Dasar (MI/SD)' => 0, 'SLTP (SMP/MTs)' => 0, 'SLTA (SMA/MA/SMK)' => 0, 'Lainnya' => 0];

        foreach ($eduRaw as $row) {
            $name = strtolower($row->nama_pendidikan_terakhir);
            if (str_contains($name, 'mi') || str_contains($name, 'sd') || str_contains($name, 'dasar')) {
                $eduGroups['Tingkat Dasar (MI/SD)'] += $row->total;
            } elseif (str_contains($name, 'mts') || str_contains($name, 'smp') || str_contains($name, 'tsana')) {
                $eduGroups['SLTP (SMP/MTs)'] += $row->total;
            } elseif (str_contains($name, 'ma') || str_contains($name, 'sma') || str_contains($name, 'smk') || str_contains($name, 'aliyah')) {
                $eduGroups['SLTA (SMA/MA/SMK)'] += $row->total;
            } else {
                $eduGroups['Lainnya'] += $row->total;
            }
        }

        // Recent registrations
        $recentSantri = Santri::with('lembaga')
            ->orderByDesc('created_at')
            ->take(5)
            ->get();

        return view('vendor.backpack.ui.dashboard', compact(
            'totalSantri', 'sudahDatang', 'belumDatang',
            'diverifikasi', 'ditolak', 'prosesVerif',
            'eduGroups', 'recentSantri'
        ));
    }
}
