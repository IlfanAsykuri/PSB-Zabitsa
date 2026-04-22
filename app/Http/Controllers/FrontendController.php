<?php

namespace App\Http\Controllers;

use App\Models\LembagaPendidikan;
use App\Models\Logistik;
use App\Models\Santri;
use App\Models\SantriLogistik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function pendaftaran()
    {
        $lembaga  = LembagaPendidikan::where('status', 'aktif')->orderBy('nama_lembaga')->get();
        $logistik = Logistik::where('status', 'aktif')->get();

        return view('pendaftaran', compact('lembaga', 'logistik'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'                    => 'required|string|max:255',
            'tanggal_lahir'           => 'required|date',
            'nama_pendidikan_terakhir' => 'required|string|max:255',
            'kode_lembaga'            => 'required|exists:lembaga_pendidikan,kode_lembaga',
            'nama_wali'               => 'required|string|max:255',
            'nomor_wa_wali'           => 'required|string|max:20',
            'negara'                  => 'required|string|max:100',
            'provinsi'                => 'nullable|string|max:100',
            'kabupaten'               => 'nullable|string|max:100',
            'kecamatan'               => 'nullable|string|max:100',
            'desa'                    => 'nullable|string|max:100',
            'logistik'                => 'nullable|array',
            'logistik.*.kode'         => 'exists:logistik,kode_logistik',
            'logistik.*.ukuran'       => 'nullable|string|max:20',
            'keyakinan_asrama'        => 'required|in:sangat_yakin,yakin,ragu',
        ]);

        $kode = null;
        DB::transaction(function () use ($validated, &$kode) {
            // Santri auto-generates kode_pendaftaran in model boot()
            $santri = Santri::create([
                'kode_lembaga'             => $validated['kode_lembaga'],
                'nama'                     => $validated['nama'],
                'tanggal_lahir'            => $validated['tanggal_lahir'],
                'negara'                   => $validated['negara'],
                'provinsi'                 => $validated['provinsi'] ?? null,
                'kabupaten'                => $validated['kabupaten'] ?? null,
                'kecamatan'                => $validated['kecamatan'] ?? null,
                'desa'                     => $validated['desa'] ?? null,
                'nama_pendidikan_terakhir' => $validated['nama_pendidikan_terakhir'],
                'nama_wali'                => $validated['nama_wali'],
                'nomor_wa_wali'            => $validated['nomor_wa_wali'],
                'tahun_masuk'              => date('Y'),
                'keyakinan_asrama'         => $validated['keyakinan_asrama'],
            ]);

            $kode = $santri->kode_pendaftaran;

            // Create santri_logistik records for each selected logistik
            if (!empty($validated['logistik'])) {
                foreach ($validated['logistik'] as $item) {
                    SantriLogistik::create([
                        'kode_pendaftaran' => $kode,
                        'kode_logistik'    => $item['kode'],
                        'ukuran'           => $item['ukuran'] ?? null,
                        'status_penyerahan' => 'belum_diserahkan',
                    ]);
                }
            }
        });

        if ($request->expectsJson() || $request->header('Accept') === 'application/json') {
            return response()->json([
                'success' => true,
                'kode_pendaftaran' => $kode,
                'message' => 'Pendaftaran berhasil disimpan!'
            ]);
        }

        return redirect()->route('home')->with('success', "Pendaftaran Berhasil! Kode Pendaftaran Anda adalah: " . $kode);
    }

    public function cekStatus(Request $request)
    {
        $kode   = $request->input('kode');
        $santri = null;
        if ($kode) {
            $santri = Santri::with(['lembaga', 'logistik.logistik'])->find($kode);
        }
        $master_logistik = Logistik::where('status', 'aktif')->get();
        return view('cek-status', compact('santri', 'kode', 'master_logistik'));
    }
}
