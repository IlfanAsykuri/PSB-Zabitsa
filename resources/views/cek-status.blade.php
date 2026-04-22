@extends('layouts.app')

@section('title', 'Cek Status Pendaftaran — PSB Zabitsa')

@section('content')
    {{-- 1. Main Wrapper --}}
    <div class="min-h-screen flex flex-col bg-[#F8F5F0]">

        {{-- 2. Stable Brown Header Section --}}
        <div class="bg-[#4A3B2A] pt-32 pb-24 rounded-b-[3rem] text-center px-4 relative z-0">
            <div class="text-[#D4B483] font-semibold uppercase tracking-widest text-sm mb-2" data-aos="fade-up">Real-time
                Tracking</div>
            <h1 class="font-serif text-white text-4xl md:text-5xl font-bold mb-4" data-aos="fade-up">Cek Status Pendaftaran
            </h1>
            <p class="text-white/70 max-w-xl mx-auto" data-aos="fade-up">Masukkan kode pendaftaran Anda untuk melihat status
                terkini.</p>
        </div>

        {{-- 3. Floating Search Form Card --}}
        <div class="relative z-10 -mt-12 max-w-2xl mx-auto px-4 w-full" data-aos="fade-up" data-aos-delay="100">
            <div class="bg-white p-4 md:p-6 rounded-3xl shadow-xl">
                <form method="GET" action="{{ route('cek.status') }}"
                    class="flex flex-col md:flex-row items-center gap-4">
                    <input type="text" name="kode" value="{{ $kode ?? '' }}"
                        placeholder="Contoh: PSB-20260421-ABCDE"
                        class="w-full text-lg px-6 py-4 rounded-full border-2 border-gray-100 focus:border-[#B59551] focus:ring-4 focus:ring-[#B59551]/20 outline-none text-[#4A3B2A] font-mono transition-all">
                    <button type="submit"
                        class="btn-gold px-8 py-4 text-lg rounded-full shadow-lg hover:shadow-xl w-full md:w-auto justify-center flex-shrink-0">
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <span class="ml-2">Cek Status</span>
                    </button>
                </form>

                @if ($kode && !$santri)
                    <div class="mt-6 p-4 rounded-xl text-center bg-red-50 border border-red-200 text-red-600 animate-pulse">
                        <svg fill="currentColor" viewBox="0 0 24 24" class="w-8 h-8 mx-auto mb-2">
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" />
                        </svg>
                        <div class="font-bold">Kode tidak ditemukan</div>
                        <div class="text-sm">Periksa kembali kode pendaftaran Anda.</div>
                    </div>
                @endif
            </div>
        </div>

        {{-- 4. Content Area (Results) --}}
        <div class="flex-grow max-w-4xl mx-auto w-full px-4 pt-12 pb-20">
            @if ($santri)
                <div id="result-section"
                    class="bg-white rounded-2xl shadow-xl overflow-hidden text-left border border-gray-100">

                    {{-- Header Section --}}
                    <div
                        class="p-8 border-b border-gray-100 flex flex-col md:flex-row items-start md:items-center justify-between gap-6 relative overflow-hidden">
                        {{-- Decorative shape --}}
                        <div
                            class="absolute right-0 top-0 w-64 h-64 bg-gradient-to-br from-[#FDF3E0] to-white rounded-full -translate-y-1/2 translate-x-1/3 opacity-60 z-0">
                        </div>

                        <div class="relative z-10 flex items-center gap-5">
                            <div
                                class="flex-shrink-0 w-16 h-16 rounded-full bg-gradient-to-br from-[#B59551] to-[#D4B483] flex items-center justify-center shadow-md">
                                <svg width="32" height="32" fill="white" viewBox="0 0 24 24">
                                    <path
                                        d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="font-bold text-3xl text-[#4A3B2A] font-serif tracking-tight">{{ $santri->nama }}
                                </h2>
                                <div class="text-[#B59551] font-mono font-medium tracking-wide mt-1">
                                    {{ $santri->kode_pendaftaran }}</div>
                            </div>
                        </div>

                        <div class="relative z-10 flex flex-row md:flex-col gap-2 w-full md:w-auto mt-4 md:mt-0">
                            {{-- Kedatangan Badge --}}
                            @if ($santri->status_kedatangan === 'sudah_datang')
                                <span
                                    class="inline-flex items-center justify-center gap-1.5 px-4 py-1.5 rounded-full bg-green-50 border border-green-200 text-green-700 text-xs font-bold uppercase tracking-wide w-full md:w-auto">
                                    ✓ Sudah Datang
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center justify-center gap-1.5 px-4 py-1.5 rounded-full bg-red-50 border border-red-200 text-red-600 text-xs font-bold uppercase tracking-wide w-full md:w-auto">
                                    ✗ Belum Datang
                                </span>
                            @endif

                            {{-- Verifikasi Badge --}}
                            @if ($santri->status_verifikasi === 'diverifikasi')
                                <span
                                    class="inline-flex items-center justify-center gap-1.5 px-4 py-1.5 rounded-full bg-green-50 border border-green-200 text-green-700 text-xs font-bold uppercase tracking-wide w-full md:w-auto">
                                    ✓ Diverifikasi
                                </span>
                            @elseif($santri->status_verifikasi === 'ditolak')
                                <span
                                    class="inline-flex items-center justify-center gap-1.5 px-4 py-1.5 rounded-full bg-red-50 border border-red-200 text-red-600 text-xs font-bold uppercase tracking-wide w-full md:w-auto">
                                    ✗ Ditolak
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center justify-center gap-1.5 px-4 py-1.5 rounded-full bg-yellow-50 border border-yellow-200 text-yellow-700 text-xs font-bold uppercase tracking-wide w-full md:w-auto">
                                    ⏳ Dalam Proses
                                </span>
                            @endif
                        </div>
                    </div>

                    {{-- Data Diri --}}
                    <div class="p-8">
                        <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-6">Informasi Pendaftar</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                            <div>
                                <div class="text-xs text-gray-400 mb-1">Nama Lengkap</div>
                                <div class="font-bold text-gray-900">{{ $santri->nama }}</div>
                            </div>
                            <div>
                                <div class="text-xs text-gray-400 mb-1">Jenis Kelamin</div>
                                <div class="font-bold text-gray-900">Laki-laki</div>
                            </div>
                            <div>
                                <div class="text-xs text-gray-400 mb-1">Lembaga Tujuan</div>
                                <div class="font-bold text-[#B59551]">{{ $santri->lembaga->nama_lembaga ?? '-' }}</div>
                            </div>
                            <div>
                                <div class="text-xs text-gray-400 mb-1">Negara</div>
                                <div class="font-bold text-gray-900">{{ $santri->negara }}</div>
                            </div>
                            <div>
                                <div class="text-xs text-gray-400 mb-1">Provinsi</div>
                                <div class="font-bold text-gray-900">{{ $santri->provinsi ?: '-' }}</div>
                            </div>
                            <div>
                                <div class="text-xs text-gray-400 mb-1">Kabupaten / Kota</div>
                                <div class="font-bold text-gray-900">{{ $santri->kabupaten ?: '-' }}</div>
                            </div>
                            <div>
                                <div class="text-xs text-gray-400 mb-1">Kecamatan</div>
                                <div class="font-bold text-gray-900">{{ $santri->kecamatan ?: '-' }}</div>
                            </div>
                            <div>
                                <div class="text-xs text-gray-400 mb-1">Desa</div>
                                <div class="font-bold text-gray-900">{{ $santri->desa ?: '-' }}</div>
                            </div>
                            <div>
                                <div class="text-xs text-gray-400 mb-1">Nama Wali</div>
                                <div class="font-bold text-gray-900">{{ $santri->nama_wali }}</div>
                            </div>
                            <div>
                                <div class="text-xs text-gray-400 mb-1">Nomor Wali</div>
                                <div class="font-bold text-gray-900">{{ $santri->nomor_wa_wali }}</div>
                            </div>
                        </div>
                    </div>

                    {{-- Logistics / Perlengkapan Section --}}
                    <div class="p-8 bg-gray-50 border-t border-gray-100">
                        <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-6">Status Logistik &
                            Perlengkapan</h3>

                        @if (isset($master_logistik) && count($master_logistik) > 0)
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach ($master_logistik as $master)
                                    @php
                                        $sl = $santri->logistik
                                            ->where('kode_logistik', $master->kode_logistik)
                                            ->first();
                                        $isDiserahkan = $sl && $sl->status_penyerahan === 'sudah_diserahkan';
                                    @endphp
                                    <div
                                        class="flex items-center justify-between p-4 bg-white rounded-xl shadow-sm border border-gray-100 transition hover:shadow-md">
                                        <div class="flex items-center gap-4">
                                            <div
                                                class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0 {{ $isDiserahkan ? 'bg-green-100 text-green-600' : 'bg-gray-100 text-gray-400' }}">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    @if ($isDiserahkan)
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                    @else
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4">
                                                        </path>
                                                    @endif
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="font-bold text-[#4A3B2A] text-sm">{{ $master->nama_logistik }}
                                                </div>
                                                @if ($sl && $sl->ukuran)
                                                    <div class="text-xs text-gray-500 mt-0.5">Ukuran: <span
                                                            class="font-bold text-gray-700">{{ $sl->ukuran }}</span>
                                                    </div>
                                                @else
                                                    <div class="text-xs text-gray-400 mt-0.5">Ukuran: <span
                                                            class="font-medium">-</span></div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0 ml-2">
                                            @if ($isDiserahkan)
                                                <span
                                                    class="bg-green-50 text-green-600 border border-green-200 text-[10px] font-extrabold uppercase tracking-widest px-2.5 py-1.5 rounded">✓
                                                    Diserahkan</span>
                                            @else
                                                <span
                                                    class="bg-gray-50 text-gray-500 border border-gray-200 text-[10px] font-extrabold uppercase tracking-widest px-2.5 py-1.5 rounded">Belum</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8 text-gray-400 text-sm">
                                Belum ada data master logistik.
                            </div>
                        @endif
                    </div>

                </div>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const resultSection = document.getElementById('result-section');
            if (resultSection) {
                setTimeout(() => {
                    resultSection.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }, 150);
            }
        });
    </script>
@endpush
