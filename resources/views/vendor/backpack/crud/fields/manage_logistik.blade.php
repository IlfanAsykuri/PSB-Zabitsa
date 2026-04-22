<!-- resources/views/vendor/backpack/crud/fields/manage_logistik.blade.php -->
@php
    $santri = $crud->getCurrentEntry();
    $master_logistik = \App\Models\Logistik::where('status', 'aktif')->get();
@endphp

@include('crud::fields.inc.wrapper_start')
    <label>{!! $field['label'] !!}</label>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="bg-light">
                <tr>
                    <th>Item Logistik</th>
                    <th class="text-center">Ukuran</th>
                    <th>Status Penyerahan</th>
                    <th>Keterangan / Catatan</th>
                </tr>
            </thead>
            <tbody>
                @if($master_logistik->count() > 0)
                    @foreach($master_logistik as $master)
                        @php
                            // Check if the student already has this item active in their relationships organically 
                            $existing = $santri ? $santri->logistik->where('kode_logistik', $master->kode_logistik)->first() : null;
                            $currentStatus = $existing ? $existing->status_penyerahan : 'belum_diserahkan';
                        @endphp
                        <tr>
                            <td class="align-middle">
                                <strong>{{ $master->nama_logistik }}</strong>
                            </td>
                            <td class="align-middle text-center">
                                @php $ukuranTerpilih = $existing->ukuran ?? ''; @endphp
                                @if(stripos($master->nama_logistik, 'Gamis') !== false)
                                    <select name="logistik_data[{{ $master->kode_logistik }}][ukuran]" class="form-control form-control-sm text-center mx-auto" style="max-width:120px;">
                                        <option value="">- Ukuran -</option>
                                        @foreach(['11','12','13','14','S','M','L','XL','XXL','XXXL'] as $size)
                                            <option value="{{ $size }}" {{ $ukuranTerpilih == $size ? 'selected' : '' }}>{{ $size }}</option>
                                        @endforeach
                                    </select>
                                @elseif(stripos($master->nama_logistik, 'Kopyah') !== false || stripos($master->nama_logistik, 'Songkok') !== false)
                                    <select name="logistik_data[{{ $master->kode_logistik }}][ukuran]" class="form-control form-control-sm text-center mx-auto" style="max-width:120px;">
                                        <option value="">- Ukuran -</option>
                                        @foreach(['3','4','5','6','7','8','9','10'] as $size)
                                            <option value="{{ $size }}" {{ $ukuranTerpilih == $size ? 'selected' : '' }}>{{ $size }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <input type="hidden" name="logistik_data[{{ $master->kode_logistik }}][ukuran]" value="{{ $ukuranTerpilih }}">
                                    <span class="badge badge-secondary" style="font-size:0.9rem;">{{ $ukuranTerpilih ?: '-' }}</span>
                                @endif
                            </td>
                            <td style="width: 220px;">
                                <select name="logistik_data[{{ $master->kode_logistik }}][status_penyerahan]" class="form-control">
                                    <option value="belum_diserahkan" {{ $currentStatus === 'belum_diserahkan' ? 'selected' : '' }}>Belum Diserahkan</option>
                                    <option value="sudah_diserahkan" {{ $currentStatus === 'sudah_diserahkan' ? 'selected' : '' }}>Sudah Diserahkan</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="logistik_data[{{ $master->kode_logistik }}][keterangan]" value="{{ $existing->keterangan ?? '' }}" class="form-control" placeholder="Tulis catatan (opsional)">
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">Tabel Master Logistik kosong. Silahkan tambahkan di menu Master Logistik.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    {{-- HINT --}}
    @if (isset($field['hint']))
        <p class="help-block">{!! $field['hint'] !!}</p>
    @endif
@include('crud::fields.inc.wrapper_end')
