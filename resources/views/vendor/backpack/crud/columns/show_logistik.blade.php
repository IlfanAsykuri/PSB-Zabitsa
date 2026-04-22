<!-- resources/views/vendor/backpack/crud/columns/show_logistik.blade.php -->
@php
    $santri = $crud->getCurrentEntry();
    $master_logistik = \App\Models\Logistik::where('status', 'aktif')->get();
@endphp

<div class="row">
    <div class="col-12 mt-3">
        <h5>Detail Progress Logistik: <strong class="text-primary">{{ $santri->nama }}</strong></h5>
        <hr>
    </div>
    <div class="col-12">
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-bordered table-striped mb-0">
                <thead class="bg-light">
                    <tr>
                        <th>Item Logistik</th>
                        <th class="text-center">Ukuran</th>
                        <th>Status Penyerahan</th>
                        <th>Diserahkan Oleh / Waktu</th>
                        <th>Keterangan / Catatan</th>
                    </tr>
                </thead>
                <tbody>
                    @if($master_logistik->count() > 0)
                        @foreach($master_logistik as $master)
                            @php
                                $existing = $santri ? $santri->logistik->where('kode_logistik', $master->kode_logistik)->first() : null;
                            @endphp
                            <tr>
                                <td class="align-middle" style="width: 20%;">
                                    <strong>{{ $master->nama_logistik }}</strong>
                                </td>
                                <td class="align-middle text-center" style="width: 10%;">
                                    <span class="badge badge-secondary" style="font-size:0.85rem;">{{ $existing->ukuran ?? '-' }}</span>
                                </td>
                                <td class="align-middle" style="width: 15%;">
                                    @if($existing && $existing->status_penyerahan === 'sudah_diserahkan')
                                        <span class="badge badge-success px-2 py-1"><i class="la la-check"></i> Sudah Diserahkan</span>
                                    @else
                                        <span class="badge badge-warning px-2 py-1"><i class="la la-hourglass"></i> Belum Diserahkan</span>
                                    @endif
                                </td>
                                <td class="align-middle text-sm text-muted" style="width: 25%;">
                                    @if($existing && $existing->status_penyerahan === 'sudah_diserahkan')
                                        <strong class="text-dark"><i class="la la-user"></i> {{ $existing->petugasLogistik->name ?? 'Sistem Admin' }}</strong><br>
                                        <span><i class="la la-calendar"></i> {{ $existing->tanggal_diserahkan ? $existing->tanggal_diserahkan->format('d M Y - H:i') : '-' }}</span>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="align-middle text-muted" style="width: 30%;">
                                    {{ $existing->keterangan ?? '-' }}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">Tabel Master Logistik masih kosong.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
