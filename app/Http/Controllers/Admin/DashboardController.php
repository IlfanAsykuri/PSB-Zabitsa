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

        // Ambil jumlah santri berdasarkan kode lembaga yang dituju
        $eduRaw = Santri::select('kode_lembaga', DB::raw('count(*) as total'))
            ->groupBy('kode_lembaga')
            ->get();

        // Siapkan array kosong
        $eduGroups = [];

        // Masukkan data langsung ke array sesuai nama lembaganya
        foreach ($eduRaw as $row) {
            // Jika kode lembaga kosong (belum memilih), beri label 'Lainnya' atau 'Belum Memilih'
            $kode = $row->kode_lembaga ? $row->kode_lembaga : 'Belum Memilih';

            // Format array: ['SMP-NJ' => 15, 'MANJ' => 10, dst...]
            $eduGroups[$kode] = $row->total;
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
