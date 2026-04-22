@extends('layouts.app')

@section('title', 'Formulir Pendaftaran PSB — Wilayah Zaid bin Tsabit')
@section('meta_description',
    'Isi formulir pendaftaran santri baru Wilayah Zaid bin Tsabit Putra, Pondok Pesantren Nurul
    Jadid.')

@section('content')

    {{-- Spacer for fixed navbar --}}
    <div style="height:80px;"></div>

    {{-- ============================================================ --}}
    {{-- PAGE HEADER                                                  --}}
    {{-- ============================================================ --}}
    <section style="background:linear-gradient(135deg,#4A3B2A,#6B5440);padding:3rem 1rem 5rem;">
        <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">
            <div style="color:#D4B483;font-weight:600;text-transform:uppercase;letter-spacing:.1em;font-size:.8rem;">Formulir
                Resmi</div>
            <h1
                style="font-family:'Playfair Display',serif;color:white;font-size:clamp(1.8rem,4vw,2.75rem);font-weight:800;margin-top:.5rem;">
                Pendaftaran Santri Baru
            </h1>
            <p class="text-white/70 mt-3 max-w-xl mx-auto">Lengkapi formulir berikut dengan data yang benar dan valid.</p>
        </div>
    </section>

    {{-- Success Alert handled by home route --}}

    {{-- ============================================================ --}}
    {{-- PREMIUM HEADER NOTICE                                        --}}
    {{-- ============================================================ --}}
    <section style="background:#F8F5F0;padding:0 1rem 5rem;margin-top:-3rem;">
        <div class="max-w-3xl mx-auto">
            <div
                class="relative bg-gradient-to-br from-[#F8F5F0] to-white border-l-4 border-[#B59551] rounded-r-2xl shadow-sm p-5 sm:p-8 mb-8 overflow-hidden">
                <div class="absolute -top-6 -right-6 w-32 h-32 bg-[#B59551] opacity-10 rounded-full blur-2xl"></div>

                <div class="relative z-10">
                    <div class="flex items-center gap-3 mb-4 border-b border-gray-200 pb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#B59551] shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        <h2 class="text-lg sm:text-2xl font-extrabold text-[#4A3B2A] tracking-tight uppercase">Pemesanan
                            Kamar Wilayah</h2>
                    </div>

                    <p class="font-bold text-[#B59551] text-base sm:text-lg mb-3">
                        Kuota Santri Baru Angkatan 2026-2027 Hanya <span
                            class="text-[#4A3B2A] bg-[#B59551]/20 px-2 py-0.5 rounded">100 Santri</span>
                    </p>

                    <ul class="space-y-2 text-sm sm:text-base text-gray-700 leading-relaxed">
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-[#B59551] shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Formulir ini <strong>khusus Santri Baru Putra</strong>.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-[#B59551] shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Kami hanya menerima santri baru yang sudah mengisi formulir ini.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-red-500 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Formulir akan ditutup secara otomatis jika sudah mencapai kuota.</span>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- ============================================================ --}}
            {{-- FORM                                                         --}}
            {{-- ============================================================ --}}
            <form id="registrationForm" action="{{ route('pendaftaran.store') }}" method="POST" x-data="psbForm()"
                @submit.prevent="submitForm()">
                @csrf

                <div
                    style="background:white;border-radius:20px;padding:2.5rem;box-shadow:0 8px 40px rgba(74,59,42,0.1);margin-top:2rem;">

                    {{-- ===== SECTION 1: DATA DIRI ===== --}}
                    <div id="step-1" class="mb-10">
                        <h3
                            style="font-family:'Playfair Display',serif;font-size:1.3rem;font-weight:700;color:#4A3B2A;margin-bottom:1.5rem;padding-bottom:.75rem;border-bottom:2px solid #F8F5F0;">
                            Data Diri Santri
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="md:col-span-2">
                                <label class="form-label">Nama Lengkap <span style="color:#e53e3e;">*</span></label>
                                <input type="text" name="nama" x-model="form.nama" required class="form-input"
                                    placeholder="Nama lengkap sesuai akta kelahiran">
                            </div>
                            <div>
                                <label class="form-label">Tanggal Lahir <span style="color:#e53e3e;">*</span></label>
                                <input type="date" name="tanggal_lahir" x-model="form.tanggal_lahir" required
                                    class="form-input">
                            </div>
                            <div>
                                <label class="form-label">Pendidikan Terakhir <span style="color:#e53e3e;">*</span></label>
                                <select name="nama_pendidikan_terakhir" x-model="form.pendidikan" required
                                    class="form-input">
                                    <option value="">- Pilih -</option>
                                    <option value="MI / SD">MI / SD (Madrasah Ibtidaiyah / Sekolah Dasar)</option>
                                    <option value="MTs / SMP">MTs / SMP (Madrasah Tsanawiyah / SMP)</option>
                                    <option value="MA / SMA / SMK">MA / SMA / SMK (Madrasah Aliyah / SMA/SMK)</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- ===== SECTION 2: WILAYAH ===== --}}
                    <div id="step-2" class="mb-10">
                        <h3
                            style="font-family:'Playfair Display',serif;font-size:1.3rem;font-weight:700;color:#4A3B2A;margin-bottom:1.5rem;padding-bottom:.75rem;border-bottom:2px solid #F8F5F0;">
                            Asal Wilayah
                        </h3>

                        <div class="grid grid-cols-1 gap-5">
                            <div>
                                <label class="form-label">Negara <span style="color:#e53e3e;">*</span></label>
                                <select name="negara" x-model="form.negara" @change="onNegaraChange()" required
                                    class="form-input">
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Singapura">Singapura</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>

                            {{-- Indonesia cascading --}}
                            <template x-if="form.negara === 'Indonesia'">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    <div>
                                        <label class="form-label">Provinsi <span style="color:#e53e3e;">*</span></label>
                                        <select x-model="form.provinsiId" @change="loadKabupaten()" class="form-input"
                                            :disabled="loadingProvinsi" required>
                                            <option value="" x-show="!loadingProvinsi">-- Pilih Provinsi --</option>
                                            <option value="" x-show="loadingProvinsi">Loading Provinsi...</option>
                                            <template x-for="p in provinsiList" :key="p.id">
                                                <option :value="p.id" x-text="p.name"></option>
                                            </template>
                                        </select>
                                        <input type="hidden" name="provinsi" :value="form.provinsiName">
                                    </div>
                                    <div>
                                        <label class="form-label">Kabupaten / Kota <span
                                                style="color:#e53e3e;">*</span></label>
                                        <select x-model="form.kabupatenId" @change="loadKecamatan()" class="form-input"
                                            :disabled="!form.provinsiId || loadingKabupaten" required>
                                            <option value="" x-show="!loadingKabupaten">-- Pilih Kabupaten --
                                            </option>
                                            <option value="" x-show="loadingKabupaten">Loading Kabupaten...</option>
                                            <template x-for="k in kabupatenList" :key="k.id">
                                                <option :value="k.id" x-text="k.name"></option>
                                            </template>
                                        </select>
                                        <input type="hidden" name="kabupaten" :value="form.kabupatenName">
                                    </div>
                                    <div>
                                        <label class="form-label">Kecamatan <span style="color:#e53e3e;">*</span></label>
                                        <select x-model="form.kecamatanId" @change="loadDesa()" class="form-input"
                                            :disabled="!form.kabupatenId || loadingKecamatan" required>
                                            <option value="" x-show="!loadingKecamatan">-- Pilih Kecamatan --
                                            </option>
                                            <option value="" x-show="loadingKecamatan">Loading Kecamatan...</option>
                                            <template x-for="k in kecamatanList" :key="k.id">
                                                <option :value="k.id" x-text="k.name"></option>
                                            </template>
                                        </select>
                                        <input type="hidden" name="kecamatan" :value="form.kecamatanName">
                                    </div>
                                    <div>
                                        <label class="form-label">Desa / Kelurahan <span
                                                style="color:#e53e3e;">*</span></label>
                                        <select name="desa" x-model="form.desaName" class="form-input"
                                            :disabled="!form.kecamatanId || loadingDesa" required>
                                            <option value="" x-show="!loadingDesa">-- Pilih Desa --</option>
                                            <option value="" x-show="loadingDesa">Loading Desa...</option>
                                            <template x-for="d in desaList" :key="d.id">
                                                <option :value="d.name" x-text="d.name"></option>
                                            </template>
                                        </select>
                                    </div>
                                </div>
                            </template>

                            {{-- Non-Indonesia free text --}}
                            <template x-if="form.negara !== 'Indonesia'">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    <div>
                                        <label class="form-label">Provinsi / State</label>
                                        <input type="text" name="provinsi" x-model="form.provinsiName"
                                            class="form-input" placeholder="Nama provinsi/state">
                                    </div>
                                    <div>
                                        <label class="form-label">Kabupaten / Kota</label>
                                        <input type="text" name="kabupaten" x-model="form.kabupatenName"
                                            class="form-input" placeholder="Nama kota">
                                    </div>
                                    <div>
                                        <label class="form-label">Kecamatan</label>
                                        <input type="text" name="kecamatan" x-model="form.kecamatanName"
                                            class="form-input" placeholder="Kecamatan">
                                    </div>
                                    <div>
                                        <label class="form-label">Desa / Kelurahan</label>
                                        <input type="text" name="desa" x-model="form.desaName" class="form-input"
                                            placeholder="Desa">
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>

                    {{-- ===== SECTION 3: WALI & LEMBAGA ===== --}}
                    <div id="step-3" class="mb-10">
                        <h3
                            style="font-family:'Playfair Display',serif;font-size:1.3rem;font-weight:700;color:#4A3B2A;margin-bottom:1.5rem;padding-bottom:.75rem;border-bottom:2px solid #F8F5F0;">
                            Data Wali & Pilihan Lembaga
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="form-label">Nama Wali <span style="color:#e53e3e;">*</span></label>
                                <input type="text" name="nama_wali" x-model="form.namaWali" required
                                    class="form-input" placeholder="Nama lengkap wali/orang tua">
                            </div>
                            <div>
                                <label class="form-label">No. WhatsApp Wali <span style="color:#e53e3e;">*</span></label>
                                <input type="tel" name="nomor_wa_wali" x-model="form.noWa" required
                                    class="form-input" placeholder="08xxxxxxxxxx">
                            </div>
                            <div class="md:col-span-2">
                                <label class="form-label">Pilihan Lembaga Pendidikan <span
                                        style="color:#e53e3e;">*</span></label>
                                <select name="kode_lembaga" x-model="form.lembaga" required class="form-input">
                                    <option value="">-- Pilih Lembaga --</option>
                                    @foreach ($lembaga as $l)
                                        <option value="{{ $l->kode_lembaga }}">{{ $l->nama_lembaga }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- ===== SECTION 4: LOGISTIK ===== --}}
                    <div id="step-4" class="mb-10">
                        <h3
                            style="font-family:'Playfair Display',serif;font-size:1.3rem;font-weight:700;color:#4A3B2A;margin-bottom:1.5rem;padding-bottom:.75rem;border-bottom:2px solid #F8F5F0;">
                            Pilihan Perlengkapan Santri
                        </h3>
                        <p class="text-sm text-gray-500 mb-6">Pilih perlengkapan yang Anda butuhkan beserta ukurannya.
                            Perlengkapan akan diserahkan setelah proses verifikasi.</p>

                        @php
                            $filteredLogistik = $logistik->filter(function ($i) {
                                $name = strtolower($i->nama_logistik);
                                return str_contains($name, 'gamis') ||
                                    str_contains($name, 'kopyah') ||
                                    str_contains($name, 'songkok');
                            });
                        @endphp
                        @foreach ($filteredLogistik as $item)
                            <div class="mb-5 p-4 rounded-xl" style="background:#F8F5F0;border:1px solid #E8E0D5;"
                                x-data="{ checked: false }">
                                <div class="flex items-center gap-3 mb-3">
                                    <input type="checkbox" id="log_{{ $item->kode_logistik }}" x-model="checked"
                                        @change="toggleLogistik('{{ $item->kode_logistik }}', $event.target.checked)"
                                        class="w-5 h-5 rounded" style="accent-color:#B59551;">
                                    <label for="log_{{ $item->kode_logistik }}" class="font-semibold cursor-pointer"
                                        style="color:#4A3B2A;">
                                        {{ $item->nama_logistik }}
                                        <span style="font-size:.75rem;color:#888;font-weight:400;">—
                                            {{ ucfirst($item->kategori) }}</span>
                                    </label>
                                </div>
                                <div x-show="checked" x-transition class="ml-8">
                                    <label class="form-label text-xs">Ukuran</label>
                                    @if (stripos($item->nama_logistik, 'Gamis') !== false)
                                        <select @change="setUkuran('{{ $item->kode_logistik }}', $event.target.value)"
                                            class="form-input" style="max-width:200px;" required>
                                            <option value="">- Pilih Ukuran Gamis -</option>
                                            @foreach (['11', '12', '13', '14', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL'] as $size)
                                                <option value="{{ $size }}">{{ $size }}</option>
                                            @endforeach
                                        </select>
                                    @elseif(stripos($item->nama_logistik, 'Kopyah') !== false || stripos($item->nama_logistik, 'Songkok') !== false)
                                        <select @change="setUkuran('{{ $item->kode_logistik }}', $event.target.value)"
                                            class="form-input" style="max-width:200px;" required>
                                            <option value="">- Pilih Ukuran Kopyah -</option>
                                            @foreach (['3', '4', '5', '6', '7', '8', '9', '10'] as $size)
                                                <option value="{{ $size }}">{{ $size }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <select @change="setUkuran('{{ $item->kode_logistik }}', $event.target.value)"
                                            class="form-input" style="max-width:200px;" required>
                                            <option value="">- Pilih Ukuran -</option>
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                            <option value="Bebas">Bebas / Tanpa Ukuran</option>
                                        </select>
                                    @endif
                                </div>
                            </div>
                        @endforeach

                        {{-- Hidden inputs for logistik selection --}}
                        <template x-for="(item, index) in form.logistikItems" :key="item.kode">
                            <div>
                                <input type="hidden" :name="'logistik[' + index + '][kode]'" :value="item.kode">
                                <input type="hidden" :name="'logistik[' + index + '][ukuran]'" :value="item.ukuran">
                            </div>
                        </template>

                        <div class="md:col-span-2 mt-4 p-4 rounded-xl"
                            style="background:#FFF9F0; border:1px solid #D4B483;">
                            <label class="form-label mb-3" style="font-size: 0.95rem;">APAKAH SUDAH YAKIN UNTUK
                                MEMILIH ASRAMA DI WILAYAH ZAID BIN TSABIT PUTRA KETIKA MONDOK DI PONDOK PESANTREN NURUL
                                JADID? <span style="color:#e53e3e;">*</span></label>
                            <div class="space-y-2 mb-3">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="keyakinan_asrama" value="sangat_yakin"
                                        x-model="form.keyakinan_asrama" required class="w-4 h-4"
                                        style="accent-color:#B59551;">
                                    <span class="text-sm font-semibold" style="color:#4A3B2A;">Sangat Yakin</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="keyakinan_asrama" value="yakin"
                                        x-model="form.keyakinan_asrama" required class="w-4 h-4"
                                        style="accent-color:#B59551;">
                                    <span class="text-sm font-semibold" style="color:#4A3B2A;">Yakin</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="keyakinan_asrama" value="ragu"
                                        x-model="form.keyakinan_asrama" required class="w-4 h-4"
                                        style="accent-color:#B59551;">
                                    <span class="text-sm font-semibold" style="color:#4A3B2A;">Ragu-ragu</span>
                                </label>
                            </div>
                            <div class="text-xs" style="color:#e53e3e; font-weight: 500;">
                                NB : Bagi yang masih ragu-ragu tidak akan dimasukkan ke dalam Grup WhatsApp Calon Santri
                                Baru
                            </div>
                        </div>

                        {{-- Validation summary before submit --}}
                        <div class="mt-6 p-4 rounded-xl" style="background:#FDF3E0;border:1px solid #D4B483;">
                            <div class="font-bold mb-2" style="color:#4A3B2A;font-size:.9rem;">Ringkasan Pendaftaran</div>
                            <div class="text-sm" style="color:#666;">
                                <div><span class="font-semibold">Nama:</span> <span x-text="form.nama || '-'"></span>
                                </div>
                                <div><span class="font-semibold">Lembaga:</span> <span
                                        x-text="form.lembaga || '-'"></span></div>
                                <div><span class="font-semibold">Wali:</span> <span x-text="form.namaWali || '-'"></span>
                                </div>
                                <div><span class="font-semibold">No. WA:</span> <span x-text="form.noWa || '-'"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- ===== SUBMIT BUTTON ===== --}}
                <div class="flex justify-center mt-8 pt-6" style="border-top:2px solid #F8F5F0;">
                    <button id="submitBtn" type="submit"
                        class="btn-gold text-sm py-4 px-12 text-lg shadow-lg w-full md:w-auto">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"
                            style="display:inline;vertical-align:middle;margin-right:6px;">
                            <path d="M9 16.17L4.83 12 3.41 13.41 9 19 21 7l-1.41-1.41L9 16.17z" />
                        </svg>
                        Kirim Pendaftaran
                    </button>
                </div>

        </div>{{-- end card --}}
        </form>
        </div>
    </section>

    <style>
        .form-label {
            display: block;
            font-size: .85rem;
            font-weight: 600;
            color: #4A3B2A;
            margin-bottom: .35rem;
        }

        .form-input {
            width: 100%;
            padding: .65rem 1rem;
            border: 1.5px solid #E8E0D5;
            border-radius: 10px;
            font-size: .9rem;
            color: #4A3B2A;
            background: white;
            transition: border-color .2s, box-shadow .2s;
            outline: none;
        }

        .form-input:focus {
            border-color: #B59551;
            box-shadow: 0 0 0 3px rgba(181, 149, 81, 0.15);
        }

        .form-input:disabled {
            background: #F5F0EA;
            cursor: not-allowed;
        }
    </style>

@endsection

@push('scripts')
    <script>
        function psbForm() {
            return {
                form: {
                    nama: '',
                    tanggal_lahir: '',
                    pendidikan: '',
                    negara: 'Indonesia',
                    provinsiId: '',
                    provinsiName: '',
                    kabupatenId: '',
                    kabupatenName: '',
                    kecamatanId: '',
                    kecamatanName: '',
                    desaName: '',
                    namaWali: '',
                    noWa: '',
                    lembaga: '',
                    keyakinan_asrama: '',
                    logistikItems: [],
                },
                provinsiList: [],
                kabupatenList: [],
                kecamatanList: [],
                desaList: [],
                loadingProvinsi: false,
                loadingKabupaten: false,
                loadingKecamatan: false,
                loadingDesa: false,

                API: 'https://www.emsifa.com/api-wilayah-indonesia/api',

                async init() {
                    this.loadingProvinsi = true;
                    try {
                        const resp = await fetch(this.API + '/provinces.json');
                        this.provinsiList = await resp.json();
                    } catch (e) {
                        console.error('Gagal memuat provinsi', e);
                    }
                    this.loadingProvinsi = false;
                },

                async onNegaraChange() {
                    if (this.form.negara === 'Indonesia' && this.provinsiList.length === 0) {
                        await this.init();
                    }
                    this.resetWilayah();
                },

                resetWilayah() {
                    this.form.provinsiId = '';
                    this.form.provinsiName = '';
                    this.form.kabupatenId = '';
                    this.form.kabupatenName = '';
                    this.form.kecamatanId = '';
                    this.form.kecamatanName = '';
                    this.form.desaName = '';
                    this.kabupatenList = [];
                    this.kecamatanList = [];
                    this.desaList = [];
                },

                async loadKabupaten() {
                    const sel = this.provinsiList.find(p => p.id == this.form.provinsiId);
                    this.form.provinsiName = sel ? sel.name : '';
                    this.form.kabupatenId = '';
                    this.form.kabupatenName = '';
                    this.form.kecamatanId = '';
                    this.form.kecamatanName = '';
                    this.form.desaName = '';
                    this.kabupatenList = [];
                    this.kecamatanList = [];
                    this.desaList = [];

                    if (!this.form.provinsiId) return;
                    this.loadingKabupaten = true;
                    try {
                        const resp = await fetch(this.API + '/regencies/' + this.form.provinsiId + '.json');
                        this.kabupatenList = await resp.json();
                    } catch (e) {}
                    this.loadingKabupaten = false;
                },

                async loadKecamatan() {
                    const sel = this.kabupatenList.find(k => k.id == this.form.kabupatenId);
                    this.form.kabupatenName = sel ? sel.name : '';
                    this.form.kecamatanId = '';
                    this.form.kecamatanName = '';
                    this.form.desaName = '';
                    this.kecamatanList = [];
                    this.desaList = [];

                    if (!this.form.kabupatenId) return;
                    this.loadingKecamatan = true;
                    try {
                        const resp = await fetch(this.API + '/districts/' + this.form.kabupatenId + '.json');
                        this.kecamatanList = await resp.json();
                    } catch (e) {}
                    this.loadingKecamatan = false;
                },

                async loadDesa() {
                    const sel = this.kecamatanList.find(k => k.id == this.form.kecamatanId);
                    this.form.kecamatanName = sel ? sel.name : '';
                    this.form.desaName = '';
                    this.desaList = [];

                    if (!this.form.kecamatanId) return;
                    this.loadingDesa = true;
                    try {
                        const resp = await fetch(this.API + '/villages/' + this.form.kecamatanId + '.json');
                        this.desaList = await resp.json();
                    } catch (e) {}
                    this.loadingDesa = false;
                },

                toggleLogistik(kode, checked) {
                    if (checked) {
                        this.form.logistikItems.push({
                            kode,
                            ukuran: ''
                        });
                    } else {
                        this.form.logistikItems = this.form.logistikItems.filter(i => i.kode !== kode);
                    }
                },

                setUkuran(kode, ukuran) {
                    const item = this.form.logistikItems.find(i => i.kode === kode);
                    if (item) item.ukuran = ukuran;
                },

                async submitForm() {
                    const form = document.getElementById('registrationForm');

                    if (!form.checkValidity()) {
                        form.reportValidity();
                        return;
                    }

                    const formData = new FormData(form);
                    const submitBtn = document.getElementById('submitBtn');

                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';

                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    try {
                        const response = await fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': csrfToken,
                                'Accept': 'application/json'
                            }
                        });

                        const result = await response.json();

                        if (response.ok && result.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Pendaftaran Berhasil!',
                                html: `
              <p class="mb-4 text-gray-700">Tolong simpan kode pendaftaran tersebut untuk kebutuhan real time tracking:</p>
              <div class="bg-gray-100 p-4 rounded-lg text-2xl font-bold tracking-widest text-[#4A3B2A] mb-4 border border-dashed border-[#B59551]" id="kode-pendaftaran">
                ${result.kode_pendaftaran}
              </div>
            `,
                                showCancelButton: true,
                                confirmButtonText: 'Copy Kode',
                                cancelButtonText: 'Tutup',
                                confirmButtonColor: '#B59551',
                                cancelButtonColor: '#4A3B2A',
                                allowOutsideClick: false
                            }).then((alertResult) => {
                                if (alertResult.isConfirmed) {
                                    navigator.clipboard.writeText(result.kode_pendaftaran).then(() => {
                                        Swal.fire('Tercopy!', 'Kode berhasil disalin.', 'success').then(
                                            () => {
                                                window.location.href = '/';
                                            });
                                    });
                                } else {
                                    window.location.href = '/';
                                }
                            });
                        } else {
                            let errorMsg = result.message || 'Terjadi kesalahan, pastikan semua data valid.';
                            if (result.errors) {
                                errorMsg = Object.values(result.errors).flat().join('<br>');
                            }
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal Menyimpan',
                                html: errorMsg
                            });
                            submitBtn.disabled = false;
                            submitBtn.innerText = 'Kirim Pendaftaran';
                        }
                    } catch (error) {
                        console.error(error);
                        Swal.fire('Error Database/Sistem',
                            'Terjadi kesalahan internal. Periksa console log untuk detailnya.', 'error');
                        submitBtn.disabled = false;
                        submitBtn.innerText = 'Kirim Pendaftaran';
                    }
                }
            };
        }

        function copyKode() {
            const kode = document.getElementById('kode-display').innerText;
            navigator.clipboard.writeText(kode).then(() => {
                alert('Kode ' + kode + ' berhasil disalin!');
            });
        }
    </script>
@endpush
